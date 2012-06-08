Given /^my localStorage is empty$/ do
  visit "http://localhost/"
  evaluate_script('localStorage.clear()')
end

Given /I visit the Shuttle Trip Planner page/ do
  visit "http://localhost/shuttle/planner"
end

Then /^I should see the route "([^"]*)" "([^"]*)"$/ do |id, value|
  #wait_until { find("#" + id + " option[selected]").text == value }
  #assert_equal(value, find("#" + id + " option[selected]").text)
  select = find('#' + id)
  select.find(:xpath, XPath::HTML.option(value)).should be_selected
#  find("#" + id + "
end

Then /^I select a route "([^"]*)" "([^"]*)"$/ do |id, value|
  select(value, :from => id)
end

Then /^I route the trip$/ do
  click_button('Route Trip')
end

