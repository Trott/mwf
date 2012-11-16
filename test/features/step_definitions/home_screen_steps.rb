Given /I am on the home page/ do
  visit "http://localhost/"
end

Then /I should see the home page/ do
  should have_selector("body.front")
  should have_selector("div#main_menu")
  should have_selector("ol.menu.front")
end

Given /I am on the Native iOS home page/ do
  visit "http://localhost/nativeios.html"
end