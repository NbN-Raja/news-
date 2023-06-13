echo '<div class="col-lg-6" id="blog-posts" style="    min-width: max-content;">';
                                    echo '<div class="position-relative mb-3 ">';
                                    echo '<img class="img-fluid  h-full w-full " src="./admin/postimages/' . htmlentities($post["postImage"]) . '">';
                                    echo '<div class="bg-white border border-top-0 p-4">';
                                    echo '<div class="mb-2">';
                                    echo '<a id="category" class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2" href="">' . $post['catname'] . '</a>';
                                    echo '<a class="text-body" href=""><small>' . $post['postdate'] . '</small></a>';
                                    echo '</div>';
                                    echo '<a class="h4 d-block mb-3 text-secondary text-uppercase font-weight-bold" href="news-details.php?nid=' . $post['pid'] . ')?>"">' . $post['posttitle'] . '</a>';
                                    $detail = $post['postdetail'];
                                    // echo '<p class="m-0">' . substr($detail, 0, 25) . '</p>';
                                    echo ' <div class="d-flex align-items-center">
                                <small class="ml-3"><i class="far fa-eye mr-2"></i>' . $post['view'] . '</small>
                                <small class="ml-3"><i class="far fa-comment mr-2"></i>123</small>
                            </div>';
                                    echo '
                        </div>';

                                    echo '
                    </div>';

                                    echo '
                </div>';