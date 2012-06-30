Feature: Calendars
  In order to stay abreast of events around campus
  The users
  Should be able to visit calendars

Scenario: Events Calendar
  Given my localStorage is empty
  And I am on the home page
  And I click "Calendars"
  And I click "UCSF Events"
  Then I should see the Events calendar

Scenario: Featured Academic Events Calendar
  Given my localStorage is empty
  And I am on the home page
  And I click "Calendars"
  And I click "Featured Academic Events"
  Then I should see the Featured Academic Events calendar