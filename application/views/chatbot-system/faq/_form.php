<?php if (validation_errors()) : ?>
    <div class="alert alert-danger alert-dismissable fade in">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
        <?php echo validation_errors() ?>
    </div>
<?php endif ?>
<form action="" method="post">
    <div class="row">
        <div class="col-lg-6 col-md-6">
            <div class="form-group">
                <label for="question">Question *</label>
                <input type="text" name="question" value="<?php echo $faq->question ?>" class="form-control title"
                       id="question" placeholder="Question">
            </div>
            <div class="form-group">
                <label for="slug">Keyword *</label>
                <select name="category_id" id="category_id" class="form-control">
                    <?php foreach ($categories as $category){?>
                    <option value="<?php echo $category->id ?>" <?php echo $category->id == $faq->category_id ? 'selected' :''?>> 
                        <?php echo $category->name ?> 
                    </option>
                <?php }?>
                </select>
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control">
                    <option value="1" <?php echo $faq->status == '1' || $faq->status == '' ? 'selected' : '' ?>>
                        Publish
                    </option>
                    <option value="0" <?php echo $faq->status == '0' ? 'selected' : '' ?>>UnPublish</option>
                </select>
            </div>
        </div>
        <div class="col-lg-12 col-md-12">
            <div class="form-group">
                <label for="answer">Answer *</label>
                <textarea rows="7" name="answer" class="form-control" id="answer"
                          placeholder="Answer"><?php echo $faq->answer ?></textarea>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-md-6">
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Save</button>
                <a class="btn btn-warning" href="<?php echo base_url(BACKENDFOLDER . '/'. $this->header['page_name']) ?>"><span>Cancel</span></a>
            </div>
        </div>
    </div>
</form>
<script>
    window.onload = function() {
        load_ckeditor('answer');
    };
</script>