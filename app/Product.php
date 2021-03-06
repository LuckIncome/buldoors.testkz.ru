<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Rennokki\QueryCache\Traits\QueryCacheable;
use TCG\Voyager\Traits\Resizable;
use TCG\Voyager\Traits\Translatable;

/**
 * App\Product
 *
 * @property int $id
 * @property string $name
 * @property string $brand
 * @property int $category_id
 * @property int $regular_price
 * @property int|null $sale_price
 * @property string $thumb
 * @property string $images
 * @property string|null $excerpt
 * @property string $slug
 * @property string|null $variation_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Category $categoryId
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\ProductOption[] $options
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereBrand($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereExcerpt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereImages($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereRegularPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereSalePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereThumb($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereVariationId($value)
 * @mixin \Eloquent
 * @property-read \App\Category $category
 * @property-read mixed $rating
 * @property-read mixed $variants
 * @property-read mixed $variations
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\ProductReview[] $reviews
 * @property-read mixed $link
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product search($searchTerm)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product query()
 * @property int $is_new
 * @property int $featured
 * @property int $stock_count
 * @property string|null $meta_description
 * @property string|null $meta_keywords
 * @property string|null $seo_title
 * @property-read int|null $options_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereFeatured($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereIsNew($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereMetaDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereMetaKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereSeoTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereStockCount($value)
 * @property string|null $characteristics
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereCharacteristics($value)
 * @property-read null $translated
 * @property-read \Illuminate\Database\Eloquent\Collection|\TCG\Voyager\Models\Translation[] $translations
 * @property-read int|null $translations_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereTranslation($field, $operator, $value = null, $locales = null, $default = true)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product withTranslation($locale = null, $fallback = true)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product withTranslations($locales = null, $fallback = true)
 * @property string|null $interior_img
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereInteriorImg($value)
 */
class Product extends Model
{
    use Resizable, Translatable, QueryCacheable;

    public $cacheFor = 2592000;
    protected static $flushCacheOnUpdate = true;

    protected $translatable = ['name','excerpt','characteristics','seo_title','meta_keywords','meta_description'];

    protected $fillable = ['name','brand','sku','category_id', 'regular_price','sale_price','thumb','images','slug','is_new','featured','stock_count','variation_id','interior_img','excerpt','characteristics','seo_title','meta_keywords','meta_description'];

    public static function scopeSearch($query, $searchTerm)
    {
        return $query->where('name', 'like', '%' . $searchTerm . '%')
            ->orWhere('slug', 'like', '%' . $searchTerm . '%')
            ->orWhere('brand', 'like', '%' . $searchTerm . '%');
    }

    public function options()
    {
        return $this->hasMany(ProductOption::class);
    }

    public function hasOption($option_name)
    {
        $hasOption = false;

        if ($this->options->contains('option', $option_name)) {
            $hasOption = true;
        }

        return $hasOption;
    }

    public function categoryId()
    {
        return $this->belongsTo(Category::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getLinkAttribute()
    {
        if ($this->category) {
            return '/catalog/'. $this->category->slug . '/' . $this->slug;
        } else {
            return false;
        }
    }

    public function getVariationsAttribute()
    {
        $variants = unserialize($this->variation_id);
        if ($variants)
            return Product::with('translations')->whereIn('sku', $variants)->get();
        else
            return false;
    }

    public function getVariantsAttribute()
    {
        $locale = session()->get('locale');
//        dd($locale);
        $fallbackLocale = config('app.fallback_locale');
        $variations = $this->variations;
        dd($variations);
        $variations = $variations ? $variations->translate($locale,$fallbackLocale) : $variations;


        $total = null;

        if ($variations) {
            $options = $this->options;
            $options = $options->translate($locale,$fallbackLocale);
            if ($variations && $options) {
                foreach ($variations as $variation) {
                    foreach ($variation->options as $var_option) {
                        $var_option = $var_option->translate($locale,$fallbackLocale);
                        foreach ($this->options as $option) {
                            $option = $option->translate($locale,$fallbackLocale);
                            if ($option->option == $var_option->option && $option->value != $var_option->value && !$options->contains($var_option)) {
                                if (!$this->checkProductOptions($options, 'value', $var_option->value)) {
                                    $options->push($var_option);
                                }
                            }
                        }
                    }
                    $options->all();
                }
                $total = $options->groupBy('option');

            }

        }


        return $total;
    }

    protected function checkProductOptions($products, $field, $value)
    {
        foreach ($products as $key => $product) {
            if ($product->{$field} === $value) {
                return $value;
            }
        }
        return false;
    }

    protected function checkProductOptionsOption($products, $field, $value)
    {
        foreach ($products as $key => $product) {
            if ($product->{$field} === $value) {
                return $product;
            }
        }
        return false;
    }

    protected function checkProductOptionsExists($products, $field, $value)
    {
        foreach ($products as $key => $product) {
            if ($product->{$field} != $value) {
                return true;
            }
        }
        return false;
    }

    public static function slugify($str,$options = array())
    {
        // Make sure string is in UTF-8 and strip invalid UTF-8 characters
        $str = mb_convert_encoding((string)$str, 'UTF-8', mb_list_encodings());

        $defaults = array(
            'delimiter' => '-',
            'limit' => null,
            'lowercase' => true,
            'replacements' => array(),
            'transliterate' => true,
        );

        // Merge options
        $options = array_merge($defaults, $options);

        $char_map = array(
            // Latin
            '??' => 'A', '??' => 'A', '??' => 'A', '??' => 'A', '??' => 'A', '??' => 'A', '??' => 'AE', '??' => 'C',
            '??' => 'E', '??' => 'E', '??' => 'E', '??' => 'E', '??' => 'I', '??' => 'I', '??' => 'I', '??' => 'I',
            '??' => 'D', '??' => 'N', '??' => 'O', '??' => 'O', '??' => 'O', '??' => 'O', '??' => 'O', '??' => 'O',
            '??' => 'O', '??' => 'U', '??' => 'U', '??' => 'U', '??' => 'U', '??' => 'U', '??' => 'Y', '??' => 'TH',
            '??' => 'ss',
            '??' => 'a', '??' => 'a', '??' => 'a', '??' => 'a', '??' => 'a', '??' => 'a', '??' => 'ae', '??' => 'c',
            '??' => 'e', '??' => 'e', '??' => 'e', '??' => 'e', '??' => 'i', '??' => 'i', '??' => 'i', '??' => 'i',
            '??' => 'd', '??' => 'n', '??' => 'o', '??' => 'o', '??' => 'o', '??' => 'o', '??' => 'o', '??' => 'o',
            '??' => 'o', '??' => 'u', '??' => 'u', '??' => 'u', '??' => 'u', '??' => 'u', '??' => 'y', '??' => 'th',
            '??' => 'y',
            // Latin symbols
            '??' => '(c)',
            // Greek
            '??' => 'A', '??' => 'B', '??' => 'G', '??' => 'D', '??' => 'E', '??' => 'Z', '??' => 'H', '??' => '8',
            '??' => 'I', '??' => 'K', '??' => 'L', '??' => 'M', '??' => 'N', '??' => '3', '??' => 'O', '??' => 'P',
            '??' => 'R', '??' => 'S', '??' => 'T', '??' => 'Y', '??' => 'F', '??' => 'X', '??' => 'PS', '??' => 'W',
            '??' => 'A', '??' => 'E', '??' => 'I', '??' => 'O', '??' => 'Y', '??' => 'H', '??' => 'W', '??' => 'I',
            '??' => 'Y',
            '??' => 'a', '??' => 'b', '??' => 'g', '??' => 'd', '??' => 'e', '??' => 'z', '??' => 'h', '??' => '8',
            '??' => 'i', '??' => 'k', '??' => 'l', '??' => 'm', '??' => 'n', '??' => '3', '??' => 'o', '??' => 'p',
            '??' => 'r', '??' => 's', '??' => 't', '??' => 'y', '??' => 'f', '??' => 'x', '??' => 'ps', '??' => 'w',
            '??' => 'a', '??' => 'e', '??' => 'i', '??' => 'o', '??' => 'y', '??' => 'h', '??' => 'w', '??' => 's',
            '??' => 'i', '??' => 'y', '??' => 'y', '??' => 'i',
            // Turkish
            '??' => 'S', '??' => 'I', '??' => 'C', '??' => 'U', '??' => 'O', '??' => 'G',
            '??' => 's', '??' => 'i', '??' => 'c', '??' => 'u', '??' => 'o', '??' => 'g',
            // Russian
            '??' => 'A', '??' => 'B', '??' => 'V', '??' => 'G', '??' => 'D', '??' => 'E', '??' => 'Yo', '??' => 'Zh',
            '??' => 'Z', '??' => 'I', '??' => 'Y', '??' => 'K', '??' => 'L', '??' => 'M', '??' => 'N', '??' => 'O',
            '??' => 'P', '??' => 'R', '??' => 'S', '??' => 'T', '??' => 'U', '??' => 'F', '??' => 'H', '??' => 'C',
            '??' => 'Ch', '??' => 'Sh', '??' => 'Sh', '??' => '', '??' => 'Y', '??' => '', '??' => 'E', '??' => 'Yu',
            '??' => 'Ya',
            '??' => 'a', '??' => 'b', '??' => 'v', '??' => 'g', '??' => 'd', '??' => 'e', '??' => 'yo', '??' => 'zh',
            '??' => 'z', '??' => 'i', '??' => 'y', '??' => 'k', '??' => 'l', '??' => 'm', '??' => 'n', '??' => 'o',
            '??' => 'p', '??' => 'r', '??' => 's', '??' => 't', '??' => 'u', '??' => 'f', '??' => 'h', '??' => 'c',
            '??' => 'ch', '??' => 'sh', '??' => 'sh', '??' => '', '??' => 'y', '??' => '', '??' => 'e', '??' => 'yu',
            '??' => 'ya',
            //Kazakh
            '??' => 'A','??'=>'G', '??'=>'K', '??'=>'N','??'=>'O','??'=>'U','??'=>'U','??'=>'H','??'=>'I',
            '??'=>'a', '??'=>'g', '??'=>'k', '??'=>'n', '??'=>'o', '??'=>'u', '??'=>'u', 'h'=>'h', '??'=>'i',
            // Ukrainian
            '??' => 'Ye', '??' => 'I', '??' => 'Yi', '??' => 'G',
            '??' => 'ye', '??' => 'i', '??' => 'yi', '??' => 'g',
            // Czech
            '??' => 'C', '??' => 'D', '??' => 'E', '??' => 'N', '??' => 'R', '??' => 'S', '??' => 'T', '??' => 'U',
            '??' => 'Z',
            '??' => 'c', '??' => 'd', '??' => 'e', '??' => 'n', '??' => 'r', '??' => 's', '??' => 't', '??' => 'u',
            '??' => 'z',
            // Polish
            '??' => 'A', '??' => 'C', '??' => 'e', '??' => 'L', '??' => 'N', '??' => 'o', '??' => 'S', '??' => 'Z',
            '??' => 'Z',
            '??' => 'a', '??' => 'c', '??' => 'e', '??' => 'l', '??' => 'n', '??' => 'o', '??' => 's', '??' => 'z',
            '??' => 'z',
            // Latvian
            '??' => 'A', '??' => 'C', '??' => 'E', '??' => 'G', '??' => 'i', '??' => 'k', '??' => 'L', '??' => 'N',
            '??' => 'S', '??' => 'u', '??' => 'Z',
            '??' => 'a', '??' => 'c', '??' => 'e', '??' => 'g', '??' => 'i', '??' => 'k', '??' => 'l', '??' => 'n',
            '??' => 's', '??' => 'u', '??' => 'z'
        );

        // Make custom replacements
        $str = preg_replace(array_keys($options['replacements']), $options['replacements'], $str);

        // Transliterate characters to ASCII
        if ($options['transliterate']) {
            $str = str_replace(array_keys($char_map), $char_map, $str);
        }

        // Replace non-alphanumeric characters with our delimiter
        $str = preg_replace('/[^\p{L}\p{Nd}]+/u', $options['delimiter'], $str);

        // Remove duplicate delimiters
        $str = preg_replace('/(' . preg_quote($options['delimiter'], '/') . '){2,}/', '$1', $str);

        // Truncate slug to max. characters
        $str = mb_substr($str, 0, ($options['limit'] ? $options['limit'] : mb_strlen($str, 'UTF-8')), 'UTF-8');

        // Remove delimiter from ends
        $str = trim($str, $options['delimiter']);

        return $options['lowercase'] ? mb_strtolower($str, 'UTF-8') : $str;
    }
}
