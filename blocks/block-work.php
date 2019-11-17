<div class="work-section">
        <div class="work-section-inner">
            <div class="work-top  container">
                <div class="work-top-inner">
                    <div class="work-top-item">
                        <h3>RECENT WORK</h3>
                        <p>Selection of projects we have finished lately.</p>
                    </div>
                    <div class="work-top-item">
                        <div class="work-top-item-inner">
                            <p>See more examples</p>
                            <a href="#" class="btn-default">View Work</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="work-bottom">
            <?php $addProjects = get_field('add_projects');?>
            <?php if($addProjects):?>
            <?php include TEMPLATEPATH . "/include/portfolio.php";?>
                <?php endif;?>
            </div>
        </div>
    </div>