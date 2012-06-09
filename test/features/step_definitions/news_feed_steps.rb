Given /I visit a news page/ do
  visit 'http://localhost/news'
end

Then /I should see news items/ do
  should have_content("UCSF News")
end