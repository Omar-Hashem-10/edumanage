<?php

// Check if the input is empty
function required_val($input)
{
  if (empty($input)) {
    return true;
  }
  return false;
}

// Check if the input length is less than the specified length
function min_val($input, $length)
{
  if (strlen($input) < $length) {
    return true;
  }
  return false;
}

// Check if the input length is greater than the specified length
function max_val($input, $length)
{
  if (strlen($input) > $length) {
    return true;
  }
  return false;
}

// Validate the email format
function email_val($email)
{
  if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    return false;
  }
  return true;
}

function phone_valid($phone)
{
    // Check if the length of the phone number is exactly 11 characters
    if (strlen($phone) == 11)
    {
        return true; // Return true if the condition is met
    }
    return false; // Return false if the condition is not met
}