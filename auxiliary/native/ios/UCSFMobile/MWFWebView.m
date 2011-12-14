//
//  MWFWebView.m
//  UCSFMobile
//
//  Created by SVETA on 9/14/11.
//  Copyright 2011 __MyCompanyName__. All rights reserved.
//

#import "MWFWebView.h"
#import "BSWebViewUserAgent.h"

@implementation MWFWebView

@synthesize webView           = _webView;
@synthesize splashView        = _splashView;
@synthesize initPageLoaded    = _initPageLoaded;
@synthesize parentWindow      = _parentWindow;


- (id)initWithNibName:(NSString *)nibNameOrNil bundle:(NSBundle *)nibBundleOrNil
{
    self = [super initWithNibName:nibNameOrNil bundle:nibBundleOrNil];
    if (self) {
        // Custom initialization
 
		// Set custom user agent 			

		BSWebViewUserAgent *agent = [[BSWebViewUserAgent alloc] init];
		NSDictionary *dictionary = [[NSDictionary alloc] initWithObjectsAndKeys:[NSString stringWithFormat:@"%@/%@", [agent userAgentString],@" MWF-Native-iOS/1.2.07"], @"UserAgent", nil];
		[[NSUserDefaults standardUserDefaults] registerDefaults:dictionary];
		[dictionary release];
		[agent release];

        //Initial page has not been loaded.
        self.initPageLoaded = NO;
        
        
    }
    return self;
}

- (void)didReceiveMemoryWarning
{
    // Releases the view if it doesn't have a superview.
    [super didReceiveMemoryWarning];
    
    // Release any cached data, images, etc that aren't in use.
}

#pragma mark - View lifecycle

- (void)viewDidLoad
{
    [super viewDidLoad];
        
    
    [self.view insertSubview:self.webView    atIndex:0];
    [self.view insertSubview:self.splashView atIndex:4];
    self.splashView.hidden = NO;
 
	self.webView.backgroundColor = [UIColor colorWithRed:0.53215 green:0.73046875 blue:0.73046875 alpha:1.0];	
    [self.webView setOpaque:NO];
	 
    //Initially try to load the online version - if there is an error, 
    //and the isOnline flag is set to NO, then the app will go into offline mode. 
    [self goHome];
    
    // Do any additional setup after loading the view from its nib.
}

- (void) goHome
{
    NSString *fullURL = @"http://m.ucsf.edu/";
    NSURL *url = [NSURL URLWithString:fullURL];
	NSURLRequest *requestObj = [NSURLRequest requestWithURL:url cachePolicy:NSURLRequestUseProtocolCachePolicy timeoutInterval:10.0];
    [self.webView loadRequest:requestObj];
}

- (void) goBack
{
    if([self.webView canGoBack])
    {
        [self.webView goBack];
    }
}


- (void) goForward
{
    if([self.webView canGoForward])
    {
        [self.webView goForward];
    }
}

- (void)viewDidUnload
{
    [self setWebView:nil];
    [self setSplashView:nil];
    [super viewDidUnload];
    // Release any retained subviews of the main view.
    // e.g. self.myOutlet = nil;
}

- (BOOL)shouldAutorotateToInterfaceOrientation:(UIInterfaceOrientation)interfaceOrientation
{
    // Return YES for supported orientations
    return (interfaceOrientation == UIInterfaceOrientationPortrait || 
			interfaceOrientation == UIInterfaceOrientationLandscapeLeft || 
			interfaceOrientation == UIInterfaceOrientationLandscapeRight);
}

- (void)didRotateFromInterfaceOrientation:(UIInterfaceOrientation)fromInterfaceOrientation
{
	[super didRotateFromInterfaceOrientation:fromInterfaceOrientation];
	[_webView stringByEvaluatingJavaScriptFromString:@"var e = document.createEvent('Events'); e.initEvent('orientationchange', true, false); document.dispatchEvent(e);"];
}

/*
 * UIWebViewDelegate Protocol Implementation:
 */

- (void)webView:(UIWebView *)webView didFailLoadWithError:(NSError *)error
{
	if (error.code == NSURLErrorCancelled)
		return;
    
    //If the initial page fails to load then redirect the user to the offline mode.
    if(!self.initPageLoaded)
    {
        [self.webView loadRequest:[NSURLRequest requestWithURL:[NSURL fileURLWithPath:[[NSBundle mainBundle] pathForResource:@"index" ofType:@"html"]isDirectory:NO]]];
    }
    
    //Display an alert message indicating that the user is offline.
    else
    {
        
        UIAlertView *alert = [[UIAlertView alloc] initWithTitle:@"UCSF Mobile" message:@"UCSF Mobile cannot contact the server. You may need to connect to the Internet." delegate:self cancelButtonTitle:@"OK" otherButtonTitles:nil];
        [alert autorelease];
        [alert show];
		[UIApplication sharedApplication].networkActivityIndicatorVisible = NO;

    }
}

- (void)webViewDidFinishLoad:(UIWebView *)webView
{
    [UIApplication sharedApplication].networkActivityIndicatorVisible = NO;
    
    //Indicate that at least one page has loaded.
    self.initPageLoaded = YES;

    self.splashView.hidden = YES;

    
}

- (void)webViewDidStartLoad:(UIWebView *)webView
{
    [UIApplication sharedApplication].networkActivityIndicatorVisible = YES;
}

- (BOOL)webView:(UIWebView *)webView shouldStartLoadWithRequest:(NSURLRequest *)request navigationType:(UIWebViewNavigationType)navigationType
{
	NSString *fullURL = @"http://m.ucsf.edu/";
    NSURL *url = [NSURL URLWithString:fullURL];
    if (navigationType == UIWebViewNavigationTypeLinkClicked) 
    {   // Internal MWF pages = do not scale
		// External pages (like news articles) = scale
        if([[url host] isEqualToString:[[request URL] host]])
        {
			webView.scalesPageToFit=NO;
        } else {
			webView.scalesPageToFit=YES;
		}

	}
	
    return YES;
}


- (void)dealloc {
    
    [_webView release];
    [_parentWindow release];
    
    [_splashView release];
    [super dealloc];
}


- (IBAction)forward:(id)sender 
{
    [self goForward];
}

- (IBAction)home:(id)sender 
{
    [self goHome];
}

- (IBAction)back:(id)sender 
{
    [self goBack];
}
@end
