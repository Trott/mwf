require 'rspec/expectations'
require 'capybara'
require 'test/unit/assertions'
require 'selenium/webdriver'

World(Test::Unit::Assertions)

World do
  Capybara.register_driver :iphone do |app|
    Capybara::Selenium::Driver.new(app, :browser => :iphone)
  end

  if ENV['DRIVER'] == 'firefox' then
  	session = Capybara::Session.new(:selenium)
  else
  	session = Capybara::Session.new(:iphone)
  end

  session
end