<?php

//echo DB_PREFIX;
//die('category c');
class ModelCatalogCategory extends Model {
	
	
	
	
	//пишем свои модели для опций фильтра
	public function my_option_x_1(){
		
		$query = $this->db->query("SELECT * FROM oc_product_option_value");
		return $query->rows;
		//return $query->row;
		
	}
	
	public function my_option_x_2(){
		$query = $this->db->query("SELECT * FROM oc_option_value_description");
		return $query->rows;
	}
	
	
	public function my_get_all_tables_1(){
		
		$query = $this->db->query("SELECT DISTINCT ocp.product_id, price, ocpi.image, name, description, upc, ean, jan, text FROM oc_product ocp JOIN oc_product_image ocpi ON ocp.product_id = ocpi.product_id JOIN oc_product_description ocpd ON ocpd.product_id = ocp.product_id JOIN  oc_product_attribute ocpa1 ON ocp.product_id = ocpa1.product_id");
		return $query->rows;
		//return $query->rows;
		
	}
	
	
	public function my_get_all_tables_2(){
		
		$query = $this->db->query("SELECT ocp.product_id, price, ocpi.image, name, description, upc, ean, jan FROM oc_product ocp LEFT JOIN oc_product_image ocpi ON ocp.product_id = ocpi.product_id LEFT JOIN oc_product_description ocpd ON ocpd.product_id = ocp.product_id");
		return $query->rows;
		//return $query->rows;
		
	}
	
	
	public function my_get_all_tables_attribute(){
		
		$query = $this->db->query("SELECT * FROM oc_product_attribute");
		return $query->rows;
		//return $query->rows;
		
	}
	
	
	
	
	public function get_everything_products(){
		$query = $this->db->query("SELECT product_id, name FROM oc_product_description");
		return $query->rows;
	}
	
	public function get_attribute_filter_1(){
		$query = $this->db->query("SELECT ocpa.product_id, ocpa.attribute_id, ocpa.text, ocad.name FROM oc_product_attribute ocpa INNER JOIN oc_attribute_description ocad ON ocpa.attribute_id = ocad.attribute_id");
		return $query;
	}
	
	public function getCategory($category_id) {
		$query = $this->db->query("SELECT DISTINCT * FROM " . DB_PREFIX . "category c LEFT JOIN " . DB_PREFIX . "category_description cd ON (c.category_id = cd.category_id) LEFT JOIN " . DB_PREFIX . "category_to_store c2s ON (c.category_id = c2s.category_id) WHERE c.category_id = '" . (int)$category_id . "' AND cd.language_id = '" . (int)$this->config->get('config_language_id') . "' AND c2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND c.status = '1'");

		return $query->row;
	}

	public function getCategories($parent_id = 0) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "category c LEFT JOIN " . DB_PREFIX . "category_description cd ON (c.category_id = cd.category_id) LEFT JOIN " . DB_PREFIX . "category_to_store c2s ON (c.category_id = c2s.category_id) WHERE c.parent_id = '" . (int)$parent_id . "' AND cd.language_id = '" . (int)$this->config->get('config_language_id') . "' AND c2s.store_id = '" . (int)$this->config->get('config_store_id') . "'  AND c.status = '1' ORDER BY c.sort_order, LCASE(cd.name)");

		return $query->rows;
	}

    public function getCategoriesNotAll($data = array()) {
        $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "category c LEFT JOIN " . DB_PREFIX . "category_description cd ON (c.category_id = cd.category_id) LEFT JOIN " . DB_PREFIX . "category_to_store c2s ON (c.category_id = c2s.category_id) WHERE cd.language_id = '" . (int)$this->config->get('config_language_id') . "' AND c2s.store_id = '" . (int)$this->config->get('config_store_id') . "'  AND c.status = '1' ");

        if (isset($data['parent_id']) ) {
            $query .= " AND c.parent_id = '" . (int)$data['parent_id'] . "' ";
        }

        if (isset($data['category_id']) ) {
            $query .= " AND c.category_id != '" . (int)$data['category_id'] . "' ";
        }

        $query .= " ORDER BY c.sort_order, LCASE(cd.name)";

        return $query->rows;
    }

	public function getCategoryFilters($category_id) {
		$implode = array();

		$query = $this->db->query("SELECT filter_id FROM " . DB_PREFIX . "category_filter WHERE category_id = '" . (int)$category_id . "'");

		foreach ($query->rows as $result) {
			$implode[] = (int)$result['filter_id'];
		}

		$filter_group_data = array();

		if ($implode) {
			$filter_group_query = $this->db->query("SELECT DISTINCT f.filter_group_id, fgd.name, fg.sort_order FROM " . DB_PREFIX . "filter f LEFT JOIN " . DB_PREFIX . "filter_group fg ON (f.filter_group_id = fg.filter_group_id) LEFT JOIN " . DB_PREFIX . "filter_group_description fgd ON (fg.filter_group_id = fgd.filter_group_id) WHERE f.filter_id IN (" . implode(',', $implode) . ") AND fgd.language_id = '" . (int)$this->config->get('config_language_id') . "' GROUP BY f.filter_group_id ORDER BY fg.sort_order, LCASE(fgd.name)");

			foreach ($filter_group_query->rows as $filter_group) {
				$filter_data = array();

				$filter_query = $this->db->query("SELECT DISTINCT f.filter_id, fd.name FROM " . DB_PREFIX . "filter f LEFT JOIN " . DB_PREFIX . "filter_description fd ON (f.filter_id = fd.filter_id) WHERE f.filter_id IN (" . implode(',', $implode) . ") AND f.filter_group_id = '" . (int)$filter_group['filter_group_id'] . "' AND fd.language_id = '" . (int)$this->config->get('config_language_id') . "' ORDER BY f.sort_order, LCASE(fd.name)");

				foreach ($filter_query->rows as $filter) {
					$filter_data[] = array(
						'filter_id' => $filter['filter_id'],
						'name'      => $filter['name']
					);
				}

				if ($filter_data) {
					$filter_group_data[] = array(
						'filter_group_id' => $filter_group['filter_group_id'],
						'name'            => $filter_group['name'],
						'filter'          => $filter_data
					);
				}
			}
		}

		return $filter_group_data;
	}

	public function getCategoryLayoutId($category_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "category_to_layout WHERE category_id = '" . (int)$category_id . "' AND store_id = '" . (int)$this->config->get('config_store_id') . "'");

		if ($query->num_rows) {
			return (int)$query->row['layout_id'];
		} else {
			return 0;
		}
	}

	public function getTotalCategoriesByCategoryId($parent_id = 0) {
		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "category c LEFT JOIN " . DB_PREFIX . "category_to_store c2s ON (c.category_id = c2s.category_id) WHERE c.parent_id = '" . (int)$parent_id . "' AND c2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND c.status = '1'");

		return $query->row['total'];
	}
}