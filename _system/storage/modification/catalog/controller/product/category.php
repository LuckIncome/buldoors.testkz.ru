<?php
//die('category c1');
class ControllerProductCategory extends Controller {
	public function index() {
		
		
		
		
		$this->load->language('product/category');

		$this->load->model('catalog/category');

		$this->load->model('catalog/product');

		$this->load->model('tool/image');

        $data['news'] = array();
		
		
		
		
		
		
		


        if (isset($this->request->get['filter'])) {
			$filter = $this->request->get['filter'];
		} else {
			$filter = '';
		}

		if (isset($this->request->get['sort'])) {
			$sort = $this->request->get['sort'];
		} else {
			$sort = 'p.sort_order';
		}

		if (isset($this->request->get['order'])) {
			$order = $this->request->get['order'];
		} else {
			$order = 'ASC';
		}

		if (isset($this->request->get['page'])) {
			$page = $this->request->get['page'];
		} else {
			$page = 1;
		}

		if (isset($this->request->get['limit'])) {
			$limit = (int)$this->request->get['limit'];
		} else {
			$limit = $this->config->get('theme_' . $this->config->get('config_theme') . '_product_limit');
		}


		// OCFilter start
    if (isset($this->request->get['filter_ocfilter'])) {
      $filter_ocfilter = $this->request->get['filter_ocfilter'];
    } else {
      $filter_ocfilter = '';
    }
		// OCFilter end
      
		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/home')
		);

		if (isset($this->request->get['path'])) {
			$url = '';

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['limit'])) {
				$url .= '&limit=' . $this->request->get['limit'];
			}

			$path = '';

			$parts = explode('_', (string)$this->request->get['path']);

			$category_id = (int)array_pop($parts);

			foreach ($parts as $path_id) {
				if (!$path) {
					$path = (int)$path_id;
				} else {
					$path .= '_' . (int)$path_id;
				}

				$category_info = $this->model_catalog_category->getCategory($path_id);

				if ($category_info) {
					$data['breadcrumbs'][] = array(
						'text' => $category_info['name'],
						'href' => $this->url->link('product/category', 'path=' . $path . $url)
					);
				}
			}
		} else {
			$category_id = 0;
		}

		$category_info = $this->model_catalog_category->getCategory($category_id);

		if ($category_info or isset($this->request->get['ex'])) {
			$this->document->setTitle($category_info['meta_title']);
			$this->document->setDescription($category_info['meta_description']);
			$this->document->setKeywords($category_info['meta_keyword']);

			$data['heading_title'] = $category_info['name'];

			//$data['text_compare'] = count($this->session->data['compare']);

			// Set the last category breadcrumb
			$data['breadcrumbs'][] = array(
				'text' => $category_info['name'],
				'href' => $this->url->link('product/category', 'path=' . $this->request->get['path'])
			);

			if ($category_info['image']) {
				$data['thumb'] = $this->model_tool_image->resize($category_info['image'], $this->config->get('theme_' . $this->config->get('config_theme') . '_image_category_width'), $this->config->get('theme_' . $this->config->get('config_theme') . '_image_category_height'));
			} else {
				$data['thumb'] = '';
			}

			$data['description'] = html_entity_decode($category_info['description'], ENT_QUOTES, 'UTF-8');
			$data['compare'] = $this->url->link('product/compare');

			$url = '';

			if (isset($this->request->get['filter'])) {
				$url .= '&filter=' . $this->request->get['filter'];
			}

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['limit'])) {
				$url .= '&limit=' . $this->request->get['limit'];
			}

			$data['categories'] = array();

			$results = $this->model_catalog_category->getCategories($category_id);

			foreach ($results as $result) {
				$filter_data = array(
					'filter_category_id'  => $result['category_id'],
					'filter_sub_category' => true
				);

                if ($result['image']) {
                    $image = $this->model_tool_image->resize($result['image'], 960, 490);
                } else {
                    $image = $this->model_tool_image->resize('placeholder.png', 960, 490);
                }

				$data['categories'][] = array(
                    'img' => $image,
				    'meta' => $result['meta_title'],
                    'shot_name' => $result['name'],
					'name' => $result['name'] . ($this->config->get('config_product_count') ? ' (' . $this->model_catalog_product->getTotalProducts($filter_data) . ')' : ''),
					'href' => $this->url->link('product/category', 'path=' . $this->request->get['path'] . '_' . $result['category_id'] . $url)
				);
			}

			$data['products'] = array();

			$filter_data = array(
				'filter_category_id' => $category_id,
				'filter_filter'      => $filter,
				'sort'               => $sort,
				'order'              => $order,
				'start'              => ($page - 1) * $limit,
				'limit'              => $limit
			);


  		// OCFilter start
  		$filter_data['filter_ocfilter'] = $filter_ocfilter;
  		// OCFilter end
      
			$product_total = $this->model_catalog_product->getTotalProducts($filter_data);

			$results = $this->model_catalog_product->getProducts($filter_data);


			//echo $this->config->get('theme_' . $this->config->get('config_theme') . '_image_product_height');
			foreach ($results as $result) {
				if ($result['image']) {
					$image = $this->model_tool_image->resize($result['image'], $this->config->get('theme_' . $this->config->get('config_theme') . '_image_product_width'), $this->config->get('theme_' . $this->config->get('config_theme') . '_image_product_height'));
				} else {
					$image = $this->model_tool_image->resize('placeholder.png', $this->config->get('theme_' . $this->config->get('config_theme') . '_image_product_width'), $this->config->get('theme_' . $this->config->get('config_theme') . '_image_product_height'));
				}

				if ($this->customer->isLogged() || !$this->config->get('config_customer_price')) {
					$price = $this->currency->format($this->tax->calculate($result['price'], $result['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
				} else {
					$price = false;
				}

				if ((float)$result['special']) {
					$special = $this->currency->format($this->tax->calculate($result['special'], $result['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
				} else {
					$special = false;
				}

				if ($this->config->get('config_tax')) {
					$tax = $this->currency->format((float)$result['special'] ? $result['special'] : $result['price'], $this->session->data['currency']);
				} else {
					$tax = false;
				}

				if ($this->config->get('config_review_status')) {
					$rating = (int)$result['rating'];
				} else {
					$rating = false;
				}

				if (!isset($this->request->get['ex']) && isset($this->request->get['path'])) {
					$data['products'][] = array(
						'product_id'  => $result['product_id'],
						'thumb'       => $image,
						'name'        => $result['name'],
						'description' => utf8_substr(trim(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8'))), 0, $this->config->get('theme_' . $this->config->get('config_theme') . '_product_description_length')) . '..',
						'price'       => number_format($price, 0, ',', ' '),
						'special'     => number_format($special, 0, ',', ' '),
						'tax'         => $tax,
						'stock'       => $result['stock_status'],
						'model'       => $result['model'],
						'article'     => $result['sku'],
						'upc'         => $result['upc'],
						'ean'         => $result['ean'],
						'jan'         => $result['jan'],
						'minimum'     => $result['minimum'] > 0 ? $result['minimum'] : 1,
						'rating'      => $result['rating'],
						'href'        => $this->url->link('product/product', 'path=' . $this->request->get['path'] . '&product_id=' . $result['product_id'] . $url)
					);
				}
				
				
			}

			$url = '';


      // OCFilter start
			if (isset($this->request->get['filter_ocfilter'])) {
				$url .= '&filter_ocfilter=' . $this->request->get['filter_ocfilter'];
			}
      // OCFilter end
      
			if (isset($this->request->get['filter'])) {
				$url .= '&filter=' . $this->request->get['filter'];
			}

			if (isset($this->request->get['limit'])) {
				$url .= '&limit=' . $this->request->get['limit'];
			}

            $data['new_product'] = array();

            $filter_data = array(
                'sort'  => 'p.date_added',
                'order' => 'DESC',
                'start' => 0,
                'limit' => 12
            );

            $results = $this->model_catalog_product->getProducts($filter_data);

            if ($results) {

                foreach ($results as $result) {

                    $categories_data =array();

                    $categories_id = $this->model_catalog_product->getCategories($result['product_id']);

                    foreach ($categories_id as $category_id) {

                        $categories = $this->model_catalog_category->getCategory($category_id['category_id']);

                        $categories_data[] = array(
                            'name' =>  $categories['name']
                        );
                    }

                    if ($result['image']) {
                        $image = $this->model_tool_image->resize($result['image'], 300, 427);
                    } else {
                        $image = $this->model_tool_image->resize('placeholder.png', 300, 427);
                    }

                    if ($this->customer->isLogged() || !$this->config->get('config_customer_price')) {
                        $price = $this->currency->format($this->tax->calculate($result['price'], $result['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
                    } else {
                        $price = false;
                    }

                    if ((float)$result['special']) {
                        $special = $this->currency->format($this->tax->calculate($result['special'], $result['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
                    } else {
                        $special = false;
                    }

                    if ($this->config->get('config_tax')) {
                        $tax = $this->currency->format((float)$result['special'] ? $result['special'] : $result['price'], $this->session->data['currency']);
                    } else {
                        $tax = false;
                    }

                    if ($this->config->get('config_review_status')) {
                        $rating = $result['rating'];
                    } else {
                        $rating = false;
                    }

                    if ($result['name'] != 'Отзыв' && $result['name'] != 'Новость'  && $result['name'] != 'Акция') {
                        $data['new_product'][] = array(
                            'product_id'  => $result['product_id'],
                            'thumb'       => $image,
                            'name'        => $result['name'],
                            'description' => utf8_substr(trim(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8'))), 0, $this->config->get('theme_' . $this->config->get('config_theme') . '_product_description_length')) . '..',
                            'price'       => $price,
                            'special'     => $special,
                            'tax'         => $tax,
                            'rating'      => $rating,
                            'href'        => $this->url->link('product/product', 'product_id=' . $result['product_id']),
                            'category'    => $categories_data
                        );
                    }
                }

            }
            $data['bestsellers'] = array();

            $resultsBestsellers = $this->model_catalog_product->getBestSellerProducts(16);

            if ($resultsBestsellers) {
                foreach ($resultsBestsellers as $result1) {

                    $categories_data =array();

                    $categories_id = $this->model_catalog_product->getCategories($result1['product_id']);

                    foreach ($categories_id as $category_id) {

                        $categories = $this->model_catalog_category->getCategory($category_id['category_id']);

                        $categories_data[] = array(
                            'name' =>  $categories['name']
                        );
                    }

                    if ($result1['image']) {
                        $image = $this->model_tool_image->resize($result1['image'], 300, 427);
                    } else {
                        $image = $this->model_tool_image->resize('placeholder.png', 300, 427);
                    }

                    if ($this->customer->isLogged() || !$this->config->get('config_customer_price')) {
                        $price = $this->currency->format($this->tax->calculate($result1['price'], $result1['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
                    } else {
                        $price = false;
                    }

                    if ((float)$result1['special']) {
                        $special = $this->currency->format($this->tax->calculate($result1['special'], $result1['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
                    } else {
                        $special = false;
                    }

                    if ($this->config->get('config_tax')) {
                        $tax = $this->currency->format((float)$result1['special'] ? $result1['special'] : $result1['price'], $this->session->data['currency']);
                    } else {
                        $tax = false;
                    }

                    if ($this->config->get('config_review_status')) {
                        $rating = $result1['rating'];
                    } else {
                        $rating = false;
                    }

                    $data['bestsellers'][] = array(
                        'product_id'  => $result1['product_id'],
                        'thumb'       => $image,
                        'name'        => $result1['name'],
                        'description' => utf8_substr(trim(strip_tags(html_entity_decode($result1['description'], ENT_QUOTES, 'UTF-8'))), 0, $this->config->get('theme_' . $this->config->get('config_theme') . '_product_description_length')) . '..',
                        'price'       => number_format($price, 0, ',', ' '),
					    'special'     => number_format($special, 0, ',', ' '),
                        'tax'         => $tax,
                        'rating'      => $rating,
                        'href'        => $this->url->link('product/product', 'product_id=' . $result1['product_id']),
                        'category'    => $categories_data
                    );
                }

            }

            $data['specials'] = array();

            $filter_data1 = array(
                'sort'  => 'pd.name',
                'order' => 'ASC',
                'start' => 0
            );

            $results = $this->model_catalog_product->getProductSpecials($filter_data1);

            if ($results) {
                foreach ($results as $result) {

                    $categories_data =array();

                    $categories_id = $this->model_catalog_product->getCategories($result['product_id']);

                    foreach ($categories_id as $category_id) {

                        $categories = $this->model_catalog_category->getCategory($category_id['category_id']);

                        $categories_data[] = array(
                            'name' =>  $categories['name']
                        );
                    }

                    if ($result['image']) {
                        $image = $this->model_tool_image->resize($result['image'], 300, 427);
                    } else {
                        $image = $this->model_tool_image->resize('placeholder.png', 300, 427);
                    }

                    if ($this->customer->isLogged() || !$this->config->get('config_customer_price')) {
                        $price = $this->currency->format($this->tax->calculate($result['price'], $result['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
                    } else {
                        $price = false;
                    }

                    if ((float)$result['special']) {
                        $special = $this->currency->format($this->tax->calculate($result['special'], $result['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
                    } else {
                        $special = false;
                    }

                    if ($this->config->get('config_tax')) {
                        $tax = $this->currency->format((float)$result['special'] ? $result['special'] : $result['price'], $this->session->data['currency']);
                    } else {
                        $tax = false;
                    }

                    if ($this->config->get('config_review_status')) {
                        $rating = $result['rating'];
                    } else {
                        $rating = false;
                    }

                    $data['specials'][] = array(
                        'product_id'  => $result['product_id'],
                        'thumb'       => $image,
                        'name'        => $result['name'],
                        'description' => utf8_substr(trim(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8'))), 0, $this->config->get('theme_' . $this->config->get('config_theme') . '_product_description_length')) . '..',
                        'price'       => number_format($price, 0, ',', ' '),
					    'special'     => number_format($special, 0, ',', ' '),
                        'tax'         => $tax,
                        'rating'      => $rating,
                        'href'        => $this->url->link('product/product', 'product_id=' . $result['product_id']),
                        'category'    => $categories_data
                    );
                }

            }

            $filter_news = array(
                'filter_category_id' => 17
            );

            $news = $this->model_catalog_product->getProducts($filter_news);
            

            foreach ($news as $result) {

                if ($result['image']) {
                    $image = $this->model_tool_image->resize($result['image'], 340, 170);
                } else {
                    $image = $this->model_tool_image->resize('placeholder.png', 340, 170);
                }

                if ($this->customer->isLogged() || !$this->config->get('config_customer_price')) {
                    $price = $this->currency->format($this->tax->calculate($result['price'], $result['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
                } else {
                    $price = false;
                }

                if ((float)$result['special']) {
                    $special = $this->currency->format($this->tax->calculate($result['special'], $result['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
                } else {
                    $special = false;
                }

                if ($this->config->get('config_tax')) {
                    $tax = $this->currency->format((float)$result['special'] ? $result['special'] : $result['price'], $this->session->data['currency']);
                } else {
                    $tax = false;
                }

                if ($this->config->get('config_review_status')) {
                    $rating = $result['rating'];
                } else {
                    $rating = false;
                }

                $data['news'][] = array(
                    'product_id'  => $result['product_id'],
                    'thumb'       => $image,
                    'model'       => $result['model'],
                    'sku'         => $result['sku'],
                    'description' => html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8'),
                    'price'       => number_format($price, 0, ',', ' '),
				    'special'     => number_format($special, 0, ',', ' '),
                    'tax'         => $tax,
                    'date'        => $result['date_added'],
                    'rating'      => $rating,
                    'href'        => $this->url->link('product/product', 'product_id=' . $result['product_id'])
                );
                
            }

            $filter_sales = array(
                'filter_category_id' => 57
            );

            $sales = $this->model_catalog_product->getProducts($filter_sales);

            $data['sales'] = array();

            foreach ($sales as $result) {

                if ($result['image']) {
                    $image = $this->model_tool_image->resize($result['image'], 630, 300);
                } else {
                    $image = $this->model_tool_image->resize('placeholder.png', 630, 300);
                }

                if ($this->customer->isLogged() || !$this->config->get('config_customer_price')) {
                    $price = $this->currency->format($this->tax->calculate($result['price'], $result['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
                } else {
                    $price = false;
                }

                if ((float)$result['special']) {
                    $special = $this->currency->format($this->tax->calculate($result['special'], $result['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
                } else {
                    $special = false;
                }

                if ($this->config->get('config_tax')) {
                    $tax = $this->currency->format((float)$result['special'] ? $result['special'] : $result['price'], $this->session->data['currency']);
                } else {
                    $tax = false;
                }

                if ($this->config->get('config_review_status')) {
                    $rating = $result['rating'];
                } else {
                    $rating = false;
                }

                $data['sales'][] = array(
                    'product_id'  => $result['product_id'],
                    'thumb'       => $image,
                    'name'       => $result['name'],
                    'model'       => $result['model'],
                    'sku'         => $result['sku'],
                    'description' => html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8'),
                    'price'       => number_format($price, 0, ',', ' '),
				    'special'     => number_format($special, 0, ',', ' '),
                    'tax'         => $tax,
                    'date'        => $result['date_added'],
                    'rating'      => $rating,
                    'href'        => $this->url->link('product/product', 'product_id=' . $result['product_id'])
                );
            }

			$data['sorts'] = array();

			$data['sorts'][] = array(
				'text'  => $this->language->get('text_default'),
				'value' => 'p.sort_order-ASC',
				'href'  => $this->url->link('product/category', 'path=' . $this->request->get['path'] . '&sort=p.sort_order&order=ASC' . $url)
			);

/*			$data['sorts'][] = array(
				'text'  => $this->language->get('text_name_asc'),
				'value' => 'pd.name-ASC',
				'href'  => $this->url->link('product/category', 'path=' . $this->request->get['path'] . '&sort=pd.name&order=ASC' . $url)
			);

			$data['sorts'][] = array(
                'text'  => $this->language->get('text_name_desc'),
                'value' => 'pd.name-DESC',
                'href'  => $this->url->link('product/category', 'path=' . $this->request->get['path'] . '&sort=pd.name&order=DESC' . $url)
            );*/

			$data['sorts'][] = array(
				'text'  => $this->language->get('text_price_asc'),
				'value' => 'p.price-ASC',
				'href'  => $this->url->link('product/category', 'path=' . $this->request->get['path'] . '&sort=p.price&order=ASC' . $url)
			);

			$data['sorts'][] = array(
				'text'  => $this->language->get('text_price_desc'),
				'value' => 'p.price-DESC',
				'href'  => $this->url->link('product/category', 'path=' . $this->request->get['path'] . '&sort=p.price&order=DESC' . $url)
			);

			if ($this->config->get('config_review_status')) {
//				$data['sorts'][] = array(
//					'text'  => $this->language->get('text_rating_desc'),
//					'value' => 'rating-DESC',
//					'href'  => $this->url->link('product/category', 'path=' . $this->request->get['path'] . '&sort=rating&order=DESC' . $url)
//				);

				$data['sorts'][] = array(
					'text'  => $this->language->get('text_rating_asc'),
					'value' => 'rating-ASC',
					'href'  => $this->url->link('product/category', 'path=' . $this->request->get['path'] . '&sort=rating&order=ASC' . $url)
				);
			}

//			$data['sorts'][] = array(
//				'text'  => $this->language->get('text_model_asc'),
//				'value' => 'p.model-ASC',
//				'href'  => $this->url->link('product/category', 'path=' . $this->request->get['path'] . '&sort=p.model&order=ASC' . $url)
//			);
//
//			$data['sorts'][] = array(
//				'text'  => $this->language->get('text_model_desc'),
//				'value' => 'p.model-DESC',
//				'href'  => $this->url->link('product/category', 'path=' . $this->request->get['path'] . '&sort=p.model&order=DESC' . $url)
//			);

			$url = '';


      // OCFilter start
			if (isset($this->request->get['filter_ocfilter'])) {
				$url .= '&filter_ocfilter=' . $this->request->get['filter_ocfilter'];
			}
      // OCFilter end
      
			if (isset($this->request->get['filter'])) {
				$url .= '&filter=' . $this->request->get['filter'];
			}

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			$data['limits'] = array();

			$limits = array_unique(array($this->config->get('theme_' . $this->config->get('config_theme') . '_product_limit'), 24, 48, 96));

			sort($limits);

			foreach($limits as $value) {
				$data['limits'][] = array(
					'text'  => $value,
					'value' => $value,
					'href'  => $this->url->link('product/category', 'path=' . $this->request->get['path'] . $url . '&limit=' . $value)
				);
			}

			$url = '';


      // OCFilter start
			if (isset($this->request->get['filter_ocfilter'])) {
				$url .= '&filter_ocfilter=' . $this->request->get['filter_ocfilter'];
			}
      // OCFilter end
      
			if (isset($this->request->get['filter'])) {
				$url .= '&filter=' . $this->request->get['filter'];
			}

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['limit'])) {
				$url .= '&limit=' . $this->request->get['limit'];
			}

			$pagination = new Pagination();
			$pagination->total = $product_total;
			$pagination->page = $page;
			$pagination->limit = $limit;
			$pagination->url = $this->url->link('product/category', 'path=' . $this->request->get['path'] . $url . '&page={page}');

			$data['pagination'] = $pagination->render();

			$data['results'] = sprintf($this->language->get('text_pagination'), ($product_total) ? (($page - 1) * $limit) + 1 : 0, ((($page - 1) * $limit) > ($product_total - $limit)) ? $product_total : ((($page - 1) * $limit) + $limit), $product_total, ceil($product_total / $limit));

			// http://googlewebmastercentral.blogspot.com/2011/09/pagination-with-relnext-and-relprev.html
			if ($page == 1) {
			    $this->document->addLink($this->url->link('product/category', 'path=' . $category_info['category_id']), 'canonical');
			} else {
				$this->document->addLink($this->url->link('product/category', 'path=' . $category_info['category_id'] . '&page='. $page), 'canonical');
			}
			
			if ($page > 1) {
			    $this->document->addLink($this->url->link('product/category', 'path=' . $category_info['category_id'] . (($page - 2) ? '&page='. ($page - 1) : '')), 'prev');
			}

			if ($limit && ceil($product_total / $limit) > $page) {
			    $this->document->addLink($this->url->link('product/category', 'path=' . $category_info['category_id'] . '&page='. ($page + 1)), 'next');
			}

			$data['sort'] = $sort;
			$data['order'] = $order;
			$data['limit'] = $limit;

      // OCFilter Start
      if ($this->ocfilter->getParams()) {
        if (isset($product_total) && !$product_total) {
      	  $this->response->redirect($this->url->link('product/category', 'path=' . $this->request->get['path']));
        }

        $this->document->setTitle($this->ocfilter->getPageMetaTitle($this->document->getTitle()));
			  $this->document->setDescription($this->ocfilter->getPageMetaDescription($this->document->getDescription()));
        $this->document->setKeywords($this->ocfilter->getPageMetaKeywords($this->document->getKeywords()));

        $data['heading_title'] = $this->ocfilter->getPageHeadingTitle($data['heading_title']);
        $data['description'] = $this->ocfilter->getPageDescription();

        if (!trim(strip_tags(html_entity_decode($data['description'], ENT_QUOTES, 'UTF-8')))) {
        	$data['thumb'] = '';
        }

        $breadcrumb = $this->ocfilter->getPageBreadCrumb();

        if ($breadcrumb) {
  			  $data['breadcrumbs'][] = $breadcrumb;
        }

        $this->document->deleteLink('canonical');
      }
      // OCFilter End
      

			$data['continue'] = $this->url->link('common/home');

			$data['column_left'] = $this->load->controller('common/column_left');
			$data['column_right'] = $this->load->controller('common/column_right');
			$data['content_top'] = $this->load->controller('common/content_top');
			$data['content_bottom'] = $this->load->controller('common/content_bottom');
			$data['footer'] = $this->load->controller('common/footer');
			$data['header'] = $this->load->controller('common/header');
			
			
			
			
			
			//ФИЛЬТРЫ ПО ЦЕНЕ
			
			
			
			
			
			
			
			
			$resolution_2 = false;
			$flag_1 = false;
			if(isset($this->request->get['sum_atr_938'])){
				$resolution_2 = true;
				$flag_1 = true;
				//echo 'amount_filter';
				$variable_920 = $this->request->get['sum_atr_938'];
				$variable_920 = str_replace('тг', '', $variable_920);
				
				
				$variable_920 = explode("-", $variable_920);
				
				
				$users_id = $_SERVER['REMOTE_ADDR'];
				//if('5.76.151.82' == $users_id){
					header("Content-Type: text/html; charset=utf-8");
					$result_product_an345 = array();
					$all_products_an345 = $this->model_catalog_category->my_get_all_tables_1();
					//echo 'before: '.count($all_products_an345).'<br>';
					$variable_920[0] = $variable_920[0]*1000;
					$variable_920[1] = $variable_920[1]*1000;
					foreach($all_products_an345 as $key=>$value){
						$bul_round_price = round((int)$value['price']);
						
					if($bul_round_price > $variable_920[0] && $bul_round_price < $variable_920[1]){
						//echo $bul_round_price.'<br>';
						continue;
					}
					else{
						unset($all_products_an345[$key]);
					}
					
					}

					unset($data['products']);
					foreach($all_products_an345 as $key=>$value){
						
						unset($data['image']);
						if ($value['image']) {
							$image = $this->model_tool_image->resize($value['image'], 630, 300);
						} else {
							$image = $this->model_tool_image->resize('placeholder.png', 630, 300);
						}
				
				
				
				
						$data['products'][] = array(
							'product_id'  => $value['product_id'],
							'thumb'       => $image,
							'name'        => $value['name'],
							'description' => utf8_substr(trim(strip_tags(html_entity_decode($value['description'], ENT_QUOTES, 'UTF-8'))), 0, $this->config->get('theme_' . $this->config->get('config_theme') . '_product_description_length')) . '..',
							'price'       => number_format($value['price'], 0, ',', ' '),
							'special'     => '',
							'tax'         => '',
							'stock'       => '',
							'model'       => '',
							'article'     => '',
							'upc'         => $value['upc'],
							'ean'         => $value['ean'],
							'jan'         => $value['jan'],
							'minimum'     => '',
							'rating'      => '',
							'href'        => ''
						);
					}
					
					echo 'after: '.count($all_products_an345).'<br>'; 
					//echo '<pre>', var_dump($all_products_an345), '</pre>';
					$this->response->setOutput($this->load->view('product/category', $data));
					
					
				//}
				
				
			}
			//ФИЛЬТРЫ ПО ОПЦИЯМ
			//$ajax_option_filter_842jj = true;
			//$ajax_option_filter_842jj = false;
			//if($ajax_option_filter_842jj){
			if (isset($this->request->get['op_r_52'])) {
				$op_r_52 = $this->request->get['op_r_52'];


			
			
			$all_product_and_options = $this->model_catalog_category->my_option_x_1();
			
			
			$all_options = $this->model_catalog_category->my_option_x_2();
			header("Content-Type: text/html; charset=utf-8");
			//echo '<pre>', var_dump($all_options), '</pre>';
			
			
			/*
			//высота
			52 = 2000 мм
			53 = 2050 мм
			60 = 2060 мм
			61 = 2090 мм
			
			//ширина
			56 = 860 мм
			57 = 960 мм
			65 = 900 мм
			74 = 600 мм
			*/
			
			
			
			foreach($all_product_and_options as $option_x_key=>$option_x_value){
				foreach($all_options as $all_options_key=>$all_options_value){
					//if($option_x_key < 8){

						if($option_x_value['option_value_id'] == $all_options_value['option_value_id']){
							
								$all_product_and_options[$option_x_key]['name'] = $all_options_value['name'];
							
						}
					
					//} 
					
					 
				}
				
				
				
			}
			
			
			
			$op_get_get = $op_r_52;
			$count_result_option = array();
			foreach($all_product_and_options as $option_932s5_key=>$option_932s5_value){
				
				if($option_932s5_value['option_value_id'] == $op_get_get){
					$count_result_option_id[] = $option_932s5_value['product_id'];
					//echo '<br>';
				}
				
			}
			//echo count($count_result_option_id);
			
				$pretty_products = array();
				$all_products_6njs7 = $this->model_catalog_category->my_get_all_tables_2();
				foreach($all_products_6njs7 as $all_products_6njs7_key=>$all_products_6njs7_value){
					foreach($count_result_option_id as $value){
						if($all_products_6njs7_value['product_id'] == $value){
							$pretty_products[] = $all_products_6njs7_value;
						}
					}
				} 
				
				
				
				
				//var_dump(count($pretty_products));
				//echo '<pre>', var_dump($pretty_products), '</pre>';
				unset($data['products']);
				
				
				foreach($pretty_products as $key=>$value){
					if($key > 11) break;
					if ($value['image']) {
						$image = $this->model_tool_image->resize($value['image'], 630, 300);
					} else {
						$image = $this->model_tool_image->resize('placeholder.png', 630, 300);
					}
					
					
					
					
					$data['products'][] = array(
						'product_id'  => $value['product_id'],
						'thumb'       => $image,
						'name'        => $value['name'],
						'description' => utf8_substr(trim(strip_tags(html_entity_decode($value['description'], ENT_QUOTES, 'UTF-8'))), 0, $this->config->get('theme_' . $this->config->get('config_theme') . '_product_description_length')) . '..',
						'price'       => number_format($value['price'], 0, ',', ' '),
						'special'     => '',
						'tax'         => '',
						'stock'       => '',
						'model'       => '',
						'article'     => '',
						'upc'         => $value['upc'],
						'ean'         => $value['ean'],
						'jan'         => $value['jan'],
						'minimum'     => '',
						'rating'      => '',
						'href'        => ''
					);
					
					
				}
			
				//die(); 
				//unset($data['footer']);
			
			}
			else{
				
				
			}
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			//ФИЛЬТРЫ ПО АТРИБУТАМ
			if (isset($this->request->get['ex'])) {
				
				$ex_ex = $this->request->get['ex'];
				$remote_addr_1 = $_SERVER['REMOTE_ADDR'];
			//if($remote_addr_1 == '2.134.24.90'){ 
				
				//для фильтра использовали таблицы oc_product_description, join(oc_product_attribute, oc_attribute_description)
				$winning_array = array();
				
				$filter_attribute_data_1 = $this->model_catalog_category->get_attribute_filter_1();
				
				header('Content-Type: text/html; charset=utf-8');
				//echo '<pre>', var_dump($filter_attribute_data_1->rows), '</pre>';
				$my_filter_data_start = array('12' => 'Внешняя отделка');
				foreach($filter_attribute_data_1->rows as $val){
					
					if($val['attribute_id'] == $ex_ex){
						$winning_array[] = $val['product_id'];
					}
					
					
				}
				
				
				
				$my_filter_product_name = $this->model_catalog_category->get_everything_products();
				
				$new_products_x = array();
				foreach($winning_array as $val){
					foreach($my_filter_product_name as $val_2){
						if($val == $val_2['product_id']){
							//echo $val_2['name'];
							//echo '<br>';
							
						}
					
					}
				}
				
				
				
				
				
				
				
				
				
				
				
				
				$my_tables_var = $this->model_catalog_category->my_get_all_tables_2();
				foreach($winning_array as $val){
					foreach($my_tables_var as $val_2){
						if($val == $val_2['product_id']){	
							$new_products_x[] = $val_2;
							//echo '<br>';
							//echo $val_2['name'];
							
						}
						else{
							//echo 'not';
							//echo '<br>';
						}
					
					}
				}
				
				
				
				
				
				
				
				foreach($new_products_x as $my_tables_var_child){
					
					
					
					
					
					
				if ($my_tables_var_child['image']) {
                    $image = $this->model_tool_image->resize($my_tables_var_child['image'], 630, 300);
                } else {
                    $image = $this->model_tool_image->resize('placeholder.png', 630, 300);
                }
				
				
				
				
					$data['products'][] = array(
						'product_id'  => $my_tables_var_child['product_id'],
						'thumb'       => $image,
						'name'        => $my_tables_var_child['name'],
						'description' => utf8_substr(trim(strip_tags(html_entity_decode($my_tables_var_child['description'], ENT_QUOTES, 'UTF-8'))), 0, $this->config->get('theme_' . $this->config->get('config_theme') . '_product_description_length')) . '..',
						'price'       => number_format($my_tables_var_child['price'], 0, ',', ' '),
						'special'     => '',
						'tax'         => '',
						'stock'       => '',
						'model'       => '',
						'article'     => '',
						'upc'         => $my_tables_var_child['upc'],
						'ean'         => $my_tables_var_child['ean'],
						'jan'         => $my_tables_var_child['jan'],
						'minimum'     => '',
						'rating'      => '',
						'href'        => ''
					);
					
					 
					
					
					/*$data['products'][] = array(
						'product_id'  => '',
						'thumb'       => $image,
						'name'        => 'hello world',
						'description' => '',
						'price'       => '',
						'special'     => '',
						'tax'         => '',
						'stock'       => '',
						'model'       => '',
						'article'     => '',
						'upc'         => '',
						'ean'         => '',
						'jan'         => '',
						'minimum'     => '',
						'rating'      => '',
						'href'        => ''
					);*/
					
					
				}
				
				
				 
				//$this->response->setOutput($this->load->view('product/category', $data));
				//die();
				
				
				
			//}
				
				
				
				
				
			$resolution_1 = true;
				
				
				
			}else if($resolution_2 != true){
				if($flag_1 != true){
				$this->response->setOutput($this->load->view('product/category', $data));
				}
			}
			
			 
			
			
			
			
			
			
			
		} else {
			$url = '';

			if (isset($this->request->get['path'])) {
				$url .= '&path=' . $this->request->get['path'];
			}

			if (isset($this->request->get['filter'])) {
				$url .= '&filter=' . $this->request->get['filter'];
			}

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

			if (isset($this->request->get['limit'])) {
				$url .= '&limit=' . $this->request->get['limit'];
			}

			$data['breadcrumbs'][] = array(
				'text' => $this->language->get('text_error'),
				'href' => $this->url->link('product/category', $url)
			);

			$this->document->setTitle($this->language->get('text_error'));

			$data['continue'] = $this->url->link('common/home');

			$this->response->addHeader($this->request->server['SERVER_PROTOCOL'] . ' 404 Not Found');

			$data['column_left'] = $this->load->controller('common/column_left');
			$data['column_right'] = $this->load->controller('common/column_right');
			$data['content_top'] = $this->load->controller('common/content_top');
			$data['content_bottom'] = $this->load->controller('common/content_bottom');
			$data['footer'] = $this->load->controller('common/footer');
			$data['header'] = $this->load->controller('common/header');

			$this->response->setOutput($this->load->view('error/not_found', $data));
		}
	}
}
