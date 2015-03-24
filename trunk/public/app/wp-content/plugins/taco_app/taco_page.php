<?php

class Page extends \Taco\Post {

  public $loaded_post = null;
  
  public function getFields() {
    $this->loadPost();
    return array_merge(
      $this->getDefaultFields(),
      $this->getFieldsByPageTemplate(
        get_page_template_slug($this->loaded_post->ID)
      )
    );
  }

  public function getDefaultFields() {
    return array(
      'banner_image_path'=>array('type'=>'image', 'description'=>'Image dimensions are best if pre-cropped at 1400 x 550 pixels. Be sure to Save for Web.'),
    );
  }
  
  public function getFieldsByPageTemplate($template_file_name) {
    if($template_file_name === 'tmpl-our-team.php' ) {
      return array(
        'person_executive_title'=>array('type'=>'text'),
        'person_executive_description'=>array('type'=>'textarea'),
        'person_executive_order' => array('type'=>'text', 'class'=>'addbysearch', 'data-post-type'=>'Person::getExecutivePersons', 'data-order-only'=>true),
        'person_national_title'=>array('type'=>'text'),
        'person_national_description'=>array('type'=>'textarea'),
        'person_national_order' => array('type'=>'text', 'class'=>'addbysearch', 'data-post-type'=>'Person::getNationalPersons', 'data-order-only'=>true),
        'person_board_title'=>array('type'=>'text'),
        'person_board_description'=>array('type'=>'textarea'),
        'person_board_order' => array('type'=>'text', 'class'=>'addbysearch', 'data-post-type'=>'Person::getBoardPersons', 'data-order-only'=>true),
        'person_advisor_title'=>array('type'=>'text'),
        'person_advisor_description'=>array('type'=>'textarea'),
        'person_advisor_order' => array('type'=>'text', 'class'=>'addbysearch', 'data-post-type'=>'Person::getAdvisorPersons', 'data-order-only'=>true),
      );
    }
    return array();
  }

  public function getDescendants() {
    return get_page_children($this->ID, self::getAll());
  }

  public function getAncestors() {
    $ancestors = get_ancestors($this->ID, $this->getPostType());
    return \Taco\Post\Factory::createMultiple($ancestors);
  }

  public function getHighestAncestor() {
    $ancestors_without_parents = array_filter($this->getAncestors(), function($post) {
      return !((bool) $post->post_parent);
    });
    return (Arr::iterable($ancestors_without_parents))
      ? current($ancestors_without_parents)
      : null;
  }

  public function getFamilyTree() {
    $ancestors = $this->getAncestors();

    // No ancestors? See if this is this has children.
    if(!Arr::iterable($ancestors)) {
      return array_merge(
        array($this),
        $this->getDescendants()
      );
    }

    $highest_ancestor = $this->getHighestAncestor();
    return ($highest_ancestor)
      ? $highest_ancestor->getDescendants()
      : array();
  }
  
  public function loadPost() {
    // For some reason, the global post var cannot be accessed at this state. So we have to load it manually
    $query_string = parse_url($_SERVER['QUERY_STRING']);
    $query_string = parse_str($query_string['path'], $query_vars);

    if(!array_key_exists('post', $query_vars)) {
      return false;
    }
    $post_id = $query_vars['post'];
    $post_object = get_post($post_id);
    if(is_object($post_object)) {
      $this->loaded_post = $post_object;
      return true;
    }
    return false;
  }
}