//
//  OnlineWebView.h
//  MWFMobile
//
//  Created by UCLA OIT ECTG on 9/14/11.
//  Copyright 2011 UCLA REGENTS. 
//  All rights reserved.
//

#import <UIKit/UIKit.h>

@interface MWFWebView : UIViewController <UIWebViewDelegate, UIAlertViewDelegate> {

    
    
    @public
    UIWebView *_webView;        
    UIWindow *_parentWindow;
    
}

@property (nonatomic, retain) IBOutlet UIWindow *parentWindow;

@property (nonatomic, retain) IBOutlet UIWebView *webView;

@property (nonatomic) BOOL initPageLoaded;

- (IBAction)forward:(id)sender;
- (IBAction)home:(id)sender;
- (IBAction)back:(id)sender;

- (void) goHome;
- (void) goBack;
- (void) goForward;

@end
	