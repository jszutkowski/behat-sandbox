@login@fixtures
Feature: User authentication
  In order to use application
  As a user
  I need to be able to authenticate correctly

  @ui
  Scenario: Redirect to Posts page after successful authentication
    Given I am on "/login"
    When I fill in "email" with "admin@admin"
    And I fill in "password" with "admin1"
    And I press "Sign in"
    Then I should be on "/post/"
    And I should see "Logged in as: admin@admin Logout" in the "p.logged-in-user" element

  @ui
  Scenario: Display error message when not existing email was passed
    Given I am on "/login"
    When I fill in "email" with "not@existing"
    And I fill in "password" with "admin1"
    And I press "Sign in"
    Then I should see "Invalid credentials."

  @ui
  Scenario: Display error message when incorrect password is filled in
    Given I am on "/login"
    When I fill in "email" with "admin@admin"
    And I fill in "password" with "xxx"
    And I press "Sign in"
    Then I should see "Invalid credentials."

  @ui
  Scenario: Redirect to login page when trying to access protected resource being not authenticated
    Given I am on "/"
    And I follow "Posts"
    Then I should be on "/login"
