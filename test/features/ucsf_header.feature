Feature: UCSF Header

Scenario: UCSF Header on About screen
  Given I am on the home page
  And I click "About"
  Then I should see the image "/assets/img/ucsf-logo.png"
  And I should see "Mobile"
  And I should see the image "/assets/img/ucsf-header-separator.png"
  And I should see "About"
