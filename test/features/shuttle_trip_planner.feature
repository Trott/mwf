Feature: Shuttle Trip Planner
  In order to delight the users
  The users
  Should be able to have their last shuttle trip saved

Scenario: Remember Last Trip
  Given my localStorage is empty
  And I visit the Shuttle Trip Planner page
  Then I should see the route "starting_from" "Parnassus"
  And I should see the route "ending_at" "Mission Bay (4th St.)"
  And I select a route "starting_from" "Mt. Zion"
  And I select a route "ending_at" "654 Minnesota"
  And I route the trip
  And I visit the Shuttle Trip Planner page
  Then I should see the route "starting_from" "Mt. Zion"
  And I should see the route "ending_at" "654 Minnesota"