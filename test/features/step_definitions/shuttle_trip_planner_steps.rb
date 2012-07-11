Given /^my localStorage is empty$/ do
	visit "http://localhost/"
	execute_script('localStorage.clear()')
	visit "http://google.com/"
end

Given /I visit the Shuttle Trip Planner page/ do
	visit "http://localhost/shuttle/planner"
end

Then /^I should see the route "([^"]*)" "([^"]*)"$/ do |id, value|
	select = find('#' + id)
	select.find(:xpath, XPath::HTML.option(value)).should be_selected
end

Then /^I select a route "([^"]*)" "([^"]*)"$/ do |id, value|
	select(value, :from => id)
end

Then /^I route the trip$/ do
	click_button('Route Trip')
end

And /^I reverse the trip$/ do
	click_button('Reverse Trip')
end

