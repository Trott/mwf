Given /^my localStorage is empty$/ do
  visit "http://localhost/"
  evaluate_script('localStorage.clear()')
end

Given /I visit the Shuttle Trip Planner page/ do
  visit "http://localhost/shuttle/planner"
end

Then /^I should see the route "([^"]*)" "([^"]*)"$/ do |id, value|
  find("#" + id).value == value
end

Then /^I select a route "([^"]*)" "([^"]*)"$/ do |id, value|
  select(value, :from => id)
end

Then /^I route the trip$/ do
  click_button('Route Trip')
end

