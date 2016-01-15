<?php
/**
 * Template Actions
 */

add_action('kt_after_pagecontent', 'pinnacle_page_comments');
function pinnacle_page_comments() {
 global $pinnacle;
 if(isset($pinnacle['page_comments']) && $pinnacle['page_comments'] == 1) {
  comments_template('/templates/comments.php');
 }
}