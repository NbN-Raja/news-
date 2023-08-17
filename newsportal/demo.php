<div class="row">
                        <div class="col-12">
                            <div>
                                <h4 class="m-0 text-uppercase font-weight-bold">Latest News</h4>
                            </div>
                        </div>

                        <!-- ************************************************ Latest News Start ***************************************************** -->
                        <?php
                        $apiUrl = 'http://localhost/news/newsportal/api/latestnews.php';

                        // Fetch data from API
                        $curl = curl_init();
                        curl_setopt($curl, CURLOPT_URL, $apiUrl);
                        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                        $response = curl_exec($curl);
                        $data = json_decode($response, true);
                        curl_close($curl);

                        // Display data
                        if ($data && is_array($data)) {
                            foreach ($data as $post) {
                        ?>
                                <div class="col-md-6"> <!-- Each post will take up half of the row -->
                                    <a href="news-details.php?nid=<?= $post['pid'] ?>">
                                        <div class="card">
                                            <div class="card-img">
                                                <img src="./admin/postimages/<?= htmlentities($post["postImage"]) ?>" alt="Post Image">
                                            </div>
                                            <div class="card-info">
                                                <a id="category" class="badge badge-info text-uppercase font-weight-semi-bold p-2 mr-2" href="#"><?= $post['catname'] ?></a>
                                                <span class="text-body"><small><?= $post['postdate'] ?></small></span>
                                                <h2 class="blog-title"><?= $post['posttitle'] ?></h2>

                                                <?php
                                                $words = explode(' ', $post['postdetail']);
                                                $limitedWords = array_slice($words, 0, 25);
                                                $limitedText = implode(' ', $limitedWords);
                                                ?>
                                                <p><?= $limitedText ?> ...</p>
                                                <hr>
                                                <small class="ml-3"><i class="far fa-eye mr-2"></i><?= $post['view'] ?></small>
                                                <small class="ml-3"><i class="far fa-comment mr-2"></i>123</small>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                        <?php
                            }
                        } else {
                            echo '<div class="col-12">No data found</div>';
                        }
                        ?>
                        <!-- ************************************************ Latest News End ***************************************************** -->
                    </div>

                    Daily News is a Nepali news website that provides up-to-date news on national and international affairs. We are committed to providing accurate and unbiased news to our readers, and we strive to be the most reliable source of news in Nepal.

Our team of experienced journalists is dedicated to bringing you the latest news from around the world. We have a network of correspondents in Nepal and around the globe, and we are always working to expand our coverage.

In addition to news, we also offer a variety of other features, including:

Opinion articles
Analysis
Interviews
Features
Videos
Photos
We believe that everyone deserves access to accurate and unbiased news, and we are committed to making our website accessible to everyone. We offer our content in both Nepali and English, and we are working to make our website available in other languages as well.

We are always looking for ways to improve our service, and we welcome your feedback. If you have any questions or suggestions, please do not hesitate to contact us.

About the Developers

Pratima Dhakal and Shreya Aryal are the developers of Daily News. They are both experienced journalists with a passion for providing accurate and unbiased news to the people of Nepal.

Pratima has been working as a journalist for over 10 years, and she has held positions at various news organizations in Nepal. She is a graduate of the Tribhuvan University, and she has a Master's degree in Journalism.

Shreya has been working as a journalist for over 5 years, and she has also held positions at various news organizations in Nepal. She is a graduate of the Kathmandu University, and she has a Bachelor's degree in Mass Communication.

Pratima and Shreya are committed to making Daily News the most reliable source of news in Nepal. They believe that everyone deserves access to accurate and unbiased news, and they are working hard to make their website the best it can be.