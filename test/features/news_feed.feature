Feature: News feed
  In order to read news
  The users
  Should be able to visit a news page

Scenario: News page
  Given I visit a news page
  Then I should see news items

Scenario: News page via Lightning Touch hash
  Given I visit the news hash
  Then I should see news items