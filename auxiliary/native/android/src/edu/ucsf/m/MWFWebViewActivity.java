package edu.ucsf.m;

import android.app.Activity;
import android.app.AlertDialog;
import android.app.ProgressDialog;
import android.content.Context;
import android.content.DialogInterface;
import android.content.Intent;
import android.graphics.Bitmap;
import android.net.Uri;
import android.os.Bundle;
import android.provider.Settings;
import android.view.KeyEvent;
import android.view.Menu;
import android.view.MenuInflater;
import android.view.MenuItem;
import android.view.Window;
import android.webkit.GeolocationPermissions;
import android.webkit.WebChromeClient;
import android.webkit.WebSettings;
import android.webkit.WebView;
import android.webkit.WebViewClient;

import com.blackboard.android.central.UCSF.R;

public class MWFWebViewActivity extends Activity {
	protected static final String ONLINE_PAGE = "http://m.ucsf.edu/";

	protected WebView webView;
	protected WebSettings settings;

	private ProgressDialog spinnerDialog;

	@Override
	public void onCreate(Bundle savedInstanceState) {

		super.onCreate(savedInstanceState);

		// Removes the title from the container window.
		requestWindowFeature(Window.FEATURE_NO_TITLE);
		setContentView(R.layout.main);

		webView = (WebView) findViewById(R.id.webview);

		webView.setWebChromeClient(new WebChromeClient() {
			public void onGeolocationPermissionsShowPrompt(String origin,
					GeolocationPermissions.Callback callback) {
				callback.invoke(origin, true, false);
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
		webView.getSettings().setGeolocationDatabasePath(
				getApplicationContext().getDir("geolocation",
						Context.MODE_PRIVATE).getAbsolutePath());
		settings.setUserAgentString(settings.getUserAgentString().concat(
				"; MWF-Native-Android/1.2.10"));

		webView.setWebViewClient(new MWFWebViewClient());
		webView.setScrollBarStyle(WebView.SCROLLBARS_OUTSIDE_OVERLAY);

		webView.loadUrl(ONLINE_PAGE);
	}

	@Override
	public boolean onCreateOptionsMenu(Menu menu) {
		MenuInflater inflater = getMenuInflater();
		inflater.inflate(R.menu.main_menu, menu);
		return true;
	}

	@Override
	public boolean onOptionsItemSelected(MenuItem item) {
		switch (item.getItemId()) {
		case R.id.refresh:
			webView.reload();
			return true;
		case R.id.back:
			if (webView.canGoBack())
				webView.goBack();
			return true;
		case R.id.forward:
			if (webView.canGoForward())
				webView.goForward();
			return true;
		case R.id.home:
			webView.loadUrl(ONLINE_PAGE);
			return true;
		default:
			return super.onOptionsItemSelected(item);
		}
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
		new AlertDialog.Builder(this)
				.setMessage(message)
				.setTitle(R.string.app_name)
				.setCancelable(true)
				.setNeutralButton("OK", null)
				.setPositiveButton("Network Settings",
						new DialogInterface.OnClickListener() {
							public void onClick(DialogInterface dialog,
									int which) {
								startActivity(new Intent(
										Settings.ACTION_WIRELESS_SETTINGS));
							}
						}).show();
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
			// TODO: make this work via rel=external rather than domain name
			String internalHost = "http://m.ucsf.edu/";
			boolean external = ! internalHost.equalsIgnoreCase(url.substring(0, internalHost.length()));
			if (external) {
				Intent intent = new Intent(Intent.ACTION_VIEW);
				intent.setData(Uri.parse(url));
				startActivity(intent);
				return true;
			} else {
				view.loadUrl(url);
				return false;
			}
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
			view.stopLoading();
			view.clearView();

			WebSettings settings = view.getSettings();
			if (settings.getCacheMode() != WebSettings.LOAD_CACHE_ONLY) {
				if (view.canGoBack())
					view.goBack();
				settings.setCacheMode(WebSettings.LOAD_CACHE_ONLY);
				// reload() will show a quick flash of the default
				// WebView error page so we use loadUrl() instead.
				view.loadUrl(failingUrl);
			} else {
				displayErrorMessage("Could not load contents. Are you offline?");
				if (view.canGoBack())
					view.goBack();
				settings.setCacheMode(WebSettings.LOAD_DEFAULT);
			}
		}
	}
}