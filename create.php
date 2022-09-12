<?php
/*
Template Name: Create product
*/
?>
<form method="POST" class="create__form">
    <div class="col1">
        <div class="custom-img-container pic-preview"></div>
        <button class="upload-custom-img">Add Picture</button>
        <button class="delete-custom-img hidden">Delete Picture</button>
    </div>
    <div class="col2">
        <label for="post_title">Product name</label>
        <input type="text" name="post_title" value="" id="title" spellcheck="true" autocomplete="off" required>
        <label for="test_created">Published</label>
        <input type="date" class="input-text short" name="test_created" id="test_created" placeholder="">
        <label for="prod_type">Product type</label>
        <select name="prod_type" id="prod_type" class="select short" data-allow_clear="true" data-placeholder="Выбрать опцию">
            <option value="" selected="selected"></option>
            <option value="Rare">Rare</option>
            <option value="Frequent">Frequent</option>
            <option value="Unusual">Unusual</option>
        </select>
        <label for="_regular_price">Price</label>
        <input type="text" class="short wc_input_price" name="_regular_price" id="_regular_price">
        <button type="submit" name="save" id="publish">Submit</button>
    </div>
    <input class="custom-img-id" name="custom-img-id" type="hidden" value="">
</form>