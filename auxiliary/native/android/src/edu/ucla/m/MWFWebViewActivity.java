package edu.ucla.m;

import android.app.Activity;
import android.app.AlertDialog;
import android.app.ProgressDialog;
import android.content.Context;
import android.content.DialogInterface;
import android.graphics.Bitmap;
import android.os.Bundle;
import android.view.KeyEvent;
import android.view.Window;
import android.webkit.JsResult;
import android.webkit.WebChromeClient;
import android.webkit.WebSettings;
import android.webkit.WebView;
import android.webkit.WebViewClient;

public class MWFWebViewActivity extends Activity {
	protected static final String ONLINE_PAGE = "http://m.ucla.edu/";

	protected WebView webView;
	protected WebSettings settings;

	private ProgressDialog spinnerDialog;

	/** Called when the activity is first created. */
	@Override
	public void onCreate(Bundle savedInstanceState) {

		super.onCreate(savedInstanceState);

		// Removes the title from the container window.
		requestWindowFeature(Window.FEATURE_NO_TITLE);
		setContentView(R.layout.main);

		webView = (WebView) findViewById(R.id.webview);

		webView.setWebChromeClient(new WebChromeClient() {
			@Override
			public boolean onJsAlert(WebView view, String url, String message,
					JsResult result) {
				displayErrorMessage(message);
				return true;
				// return super.onJsAlert(view, url, message, result);
			}
		});

		settings = webView.getSettings();
		settings.setJavaScriptEnabled(true);
		settings.setDomStorageEnabled(true);
		settings.setAppCacheEnabled(true);
		// This sets the apcache path to the default value, but without this
		// line, it does not work in Android 2.3.3.
		settings.setAppCachePath(getApplicationContext().getDir("appcache",
				Context.MODE_PRIVATE).getAbsolutePath());

		webView.setWebViewClient(new MWFWebViewClient());
		webView.setScrollBarStyle(WebView.SCROLLBARS_OUTSIDE_OVERLAY);

		webView.loadUrl(ONLINE_PAGE);
	}

	/**
	 * Show the spinner. Must be called from the UI thread.
	 * 
	 * @param title
	 *            Title of the dialog
	 * @param message
	 *            The message of the dialog
	 */
	public void spinnerStart(final String title, final String message) {
		// If the spinner is already started, just reset the title and the
		// message fields.
		if (this.spinnerDialog != null) {
			this.spinnerDialog.setTitle(title);
			this.spinnerDialog.setMessage(message);

			return;
		}

		final MWFWebViewActivity me = this;

		this.spinnerDialog = ProgressDialog.show(MWFWebViewActivity.this,
				title, message, true, true,
				new DialogInterface.OnCancelListener() {
					public void onCancel(DialogInterface dialog) {
						me.spinnerDialog = null;
					}
				});
	}

	/**
	 * Stop spinner.
	 */
	public void spinnerStop() {
		if (this.spinnerDialog != null) {

			this.spinnerDialog.dismiss();
			this.spinnerDialog = null;
		}
	}

	public void displayErrorMessage(String message) {
		new AlertDialog.Builder(this).setMessage(message)
				.setTitle("UCLA Mobile").setCancelable(true)
				.setNeutralButton("OK", null).show();
	}

	/**
	 * Capture the back key and if available, go back to the previous page in
	 * the web view's history.
	 */
	@Override
	public boolean onKeyDown(int keyCode, KeyEvent event) {

		if ((keyCode == KeyEvent.KEYCODE_BACK) && webView.canGoBack()) {
			webView.goBack();
			return true;
		}

		return super.onKeyDown(keyCode, event);
	}

	private class MWFWebViewClient extends WebViewClient {

		@Override
		public boolean shouldOverrideUrlLoading(WebView view, String url) {
			view.loadUrl(url);
			return true;
		}

		public void onPageStarted(WebView view, String url, Bitmap favicon) {
			spinnerStart("", "Loading...");
		}

		public void onPageFinished(WebView view, String url) {
			spinnerStop();
		}

		@Override
		public void onReceivedError(WebView view, int errorCode,
				String description, String failingUrl) {

			WebSettings settings = view.getSettings();
			if (settings.getCacheMode() != WebSettings.LOAD_CACHE_ONLY) {
				settings.setCacheMode(WebSettings.LOAD_CACHE_ONLY);
				view.reload();
			} else {
				view.stopLoading();
				view.clearView();
								
				if (view.canGoBack())
					view.goBack();
				
				displayErrorMessage("Could not load contents. Are you offline?");

				settings.setCacheMode(WebSettings.LOAD_DEFAULT);
			}
		}
	}
}