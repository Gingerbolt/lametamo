<?php
    class Pet
    {
        private $pet_name;
        private $food;
        private $birth;
        private $attention;
        private $rest;
        private $death;

      function __construct($pet_name, $food = 100, $birth, $attention = 100, $rest = 100, $death = false)
      {
          $this->pet_name = $pet_name;
          $this->food = $food;
          $this->birth = $birth;
          $this->attention = $attention;
          $this->death = $death;
      }

      function setPetName($new_pet_name)
      {
          $this->pet_name = (string) $new_pet_name;
      }

      function getPetName()
      {
          return $this->pet_name;
      }

      function setFood($new_food)
      {
          $this->food = $new_food;
      }

      function getFood()
      {
          return $this->food;
      }

      function setBirth($new_birth)
      {
          $this->birth = $new_birth;
      }

      function getBirth()
      {
          return $this->birth;
      }

      function setAttention($new_attention)
      {
          $this->attention = $new_attention;
      }

      function getAttention()
      {
          return $this->attention;
      }

      function setRest($new_rest)
      {
          $this->rest = $new_rest;
      }

      function getRest()
      {
          return $this->rest;
      }

      function setDeath($new_death)
      {
          $this->death = $new_death;
      }

      function getDeath()
      {
          return $this->death;
      }

      function save()
      {
          array_push($_SESSION['list_of_pets'], $this);
      }

      static function getAll()
      {
          return $_SESSION['list_of_pets'];
      }

      static function deleteAll()
      {
          return $_SESSION['list_of_pets'] = array();
      }

?>
