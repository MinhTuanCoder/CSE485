
<?php

class Article {
    private $id, $title, $summary, $content, $created, $category_id, $member_id, $image_id, $published;

    // Constructor
    public function __construct($id, $title, $summary, $content, $created, $category_id, $member_id, $image_id, $published) {
        $this->id = $id;
        $this->title = $title;
        $this->summary = $summary;
        $this->content = $content;
        $this->created = $created;
        $this->category_id = $category_id;
        $this->member_id = $member_id;
        $this->image_id = $image_id;
        $this->published = $published;
    }

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getSummary() {
        return $this->summary;
    }

    public function getContent() {
        return $this->content;
    }

    public function getCreated() {
        return $this->created;
    }

    public function getCategory_id() {
        return $this->category_id;
    }

    public function getMember_id() {
        return $this->member_id;
    }

    public function getImage_id() {
        return $this->image_id;
    }

    public function getPublished() {
        return $this->published;
    }

    // Setters
    public function setId($id) {
        $this->id = $id;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function setSummary($summary) {
        $this->summary = $summary;
    }

    public function setContent($content) {
        $this->content = $content;
    }

    public function setCreated($created) {
        $this->created = $created;
    }

    public function setCategory_id($category_id) {
        $this->category_id = $category_id;
    }

    public function setMember_id($member_id) {
        $this->member_id = $member_id;
    }

    public function setImage_id($image_id) {
        $this->image_id = $image_id;
    }

    public function setPublished($published) {
        $this->published = $published;
    }
}
