<?php
class ControllerExtensionModuleFeatured extends Controller {
	public function index($setting) {
		$this->load->language('extension/module/featured');

		$this->load->model('catalog/product');

        $this->load->model('catalog/category');

		$this->load->model('tool/image');

		$data['categories'] = array();

        $data['comments'] = array();

        $data['news'] = array();


        $categories = $this->model_catalog_category->getCategories($parent_id = 18);

        foreach ($categories as $category) {

            $products_data = array();

            $filter_products = array(
                'filter_category_id' => $category['category_id']
            );

            $products = $this->model_catalog_product->getProducts($filter_products);

            foreach ($products as $result) {

                if ($result['image']) {
                    $image = $this->model_tool_image->resize($result['image'], 340, 440);
                } else {
                    $image = $this->model_tool_image->resize('placeholder.png', $setting['width'], $setting['height']);
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

                $products_data[] = array(
                    'product_id'  => $result['product_id'],
                    'thumb'       => $image,
                    'name'        => $result['name'],
                    'description' => utf8_substr(trim(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8'))), 0, $this->config->get('theme_' . $this->config->get('config_theme') . '_product_description_length')) . '..',
                    'price'       => number_format($price, 0, ',', ' '),
					    'special'     => number_format($special, 0, ',', ' '),
                    'tax'         => $tax,
                    'rating'      => $rating,
                    'href'        => $this->url->link('product/product', 'product_id=' . $result['product_id'])
                );
            }

            $data['categories'][] = array(
                'meta_description' => $category['meta_description'],
                'description' => strip_tags(html_entity_decode($category['description'], ENT_QUOTES, 'UTF-8')),
                'meta_title' => $category['meta_title'],
                'name'     => $category['name'],
                'href'     => $this->url->link('product/category', 'path=' . $category['category_id']),
                'products' => $products_data
            );
        }

        $filter_comments = array(
            'filter_category_id' => 61
        );

        $comments = $this->model_catalog_product->getProducts($filter_comments);

        foreach ($comments as $result) {

            if ($result['image']) {
                $image = $this->model_tool_image->resize($result['image'], 100, 100);
            } else {
                $image = $this->model_tool_image->resize('placeholder.png', $setting['width'], $setting['height']);
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

            $data['comments'][] = array(
                'product_id'  => $result['product_id'],
                'thumb'       => $image,
                'model'       => $result['model'],
                'sku'         => $result['sku'],
                'description' => html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8'),
                'price'       => number_format($price, 0, ',', ' '),
					    'special'     => number_format($special, 0, ',', ' '),
                'tax'         => $tax,
                'rating'      => $rating,
                'href'        => $this->url->link('product/product', 'product_id=' . $result['product_id'])
            );
        }

        $filter_news = array(
            'filter_category_id' => 17
        );

        $news = $this->model_catalog_product->getProducts($filter_news);

        foreach ($news as $result) {

            if ($result['image']) {
                $image = $this->model_tool_image->resize($result['image'], 340, 170);
            } else {
                $image = $this->model_tool_image->resize('placeholder.png', $setting['width'], $setting['height']);
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

        if ($data['categories']) {
			return $this->load->view('extension/module/featured', $data);
		}
	}
}