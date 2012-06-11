Given /I visit a news page/ do
  visit 'http://localhost/news'
end

Given /I visit the news hash/ do
  visit 'http://localhost/#/il/news'
end

Then /I should see news items/ do
  should have_content("UCSF News")
end

And /I click "([^"]*)"/ do |link_text|
  click_link(link_text)
end