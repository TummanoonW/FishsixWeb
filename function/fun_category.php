<?php

        class FunCategory{
            public static function getAll($api){
                $categories = array(
                    new Category(NULL),
                    new Category(NULL),
                    new Category(NULL),
                    new Category(NULL)
                );
                $categories[0]->title = "CAT A";
                $categories[1]->title = "CAT B";
                $categories[2]->title = "CAT C";
                $categories[3]->title = "CAT D";
                return $categories;
            }
        }