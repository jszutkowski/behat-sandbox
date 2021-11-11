@posts@fixtures
Feature: Managing posts
  As a user
  I want to display and manage posts

  Background:
    Given I am logged in as admin

  @ui
  Scenario: I want to go to create post page
    Given I am on posts page
    When I click create new post link
    Then I should be on new post page

  @ui
  Scenario: I want to add a new post and see it on posts page
    Given I am on posts page
    And On the posts list I can see post with title "An example post" 0 time
    When I click create new post link
    And I fill in "Title" with "An example post"
    And I fill in "Content" with "Lorem ipsum"
    And I press "Save"
    Then I should be on posts page
    And On the posts list I can see post with title "An example post" 1 time

  @ui
  Scenario: I want to go to edit page of the first post
    Given I am on posts page
    And The first posts title is "First example post"
    When I click "edit" button near first post title
    Then I should be on edit post page

  @ui
  Scenario: I want to edit first post
    Given I am on posts page
    When I click "edit" button near first post title
    And I fill in "Title" with "A new title"
    And I press "Update"
    Then I should be on posts page
    And The first posts title is "A new title"
    And On the posts list I can see post with title "First example post" 0 time

  @ui
  Scenario: I can read the post
    Given I am on posts page
    When I click "show" button near first post title
    Then I should be on show post page
