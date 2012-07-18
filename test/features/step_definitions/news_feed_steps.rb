Given /I visit a news page/ do
  visit 'http://localhost/news'
end

Given /I visit the news hash/ do
  visit 'http://localhost/#/il/news'
end

Then /I should see news items/ do
  find('h2', :text => 'UCSF News').should be_visible
end

And /I click "([^"]*)"/ do |link_text|
  click_link(link_text)
end