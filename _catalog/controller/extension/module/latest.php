<?php
class ControllerExtensionModuleLatest extends Controller {
	public function index($setting) {
		$this->load->language('extension/module/latest');

        $this->load->language('extension/module/bestseller');

		$this->load->model('catalog/product');

        $this->load->model('catalog/category');

		$this->load->model('tool/image');

		$data['products'] = array();

		$filter_data = array(
			'sort'  => 'p.date_added',
			'order' => 'DESC',
			'start' => 0,
			'limit' => $setting['limit']
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

                if ($result['name'] != 'Отзыв' && $result['name'] != 'Новость' && $result['name'] != 'Акция') {
                    $data['products'][] = array(
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

		}

        $data['bestsellers'] = array();

        $resultsBestsellers = $this->model_catalog_product->getBestSellerProducts($setting['limit']);

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

        return $this->load->view('extension/module/latest', $data);
	}
}
