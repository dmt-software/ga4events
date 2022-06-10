<?php

namespace DmtSoftware\GA4Events;

/**
 * Google Analytics 4 helper
 *
 * @see https://developers.google.com/analytics/devguides/collection/ga4/reference/events
 */
class GA4Helper
{
    /**
     * @param array $values
     * @return AddPaymentInfo
     */
    public static function add_payment_info(array $values): AddPaymentInfo
    {
        return AddPaymentInfo::create($values);
    }

    /**
     * @param array $values
     * @return AddShippingInfo
     */
    public static function add_shipping_info(array $values): AddShippingInfo
    {
        return AddShippingInfo::create($values);
    }

    /**
     * @param array $values
     * @return AddToCart
     */
    public static function add_to_cart(array $values): AddToCart
    {
        return AddToCart::create($values);
    }

    /**
     * @param array $values
     * @return AddToWishlist
     */
    public static function add_to_wishlist(array $values): AddToWishlist
    {
        return AddToWishlist::create($values);
    }

    /**
     * @param array $values
     * @return BeginCheckout
     */
    public static function begin_checkout(array $values): BeginCheckout
    {
        return BeginCheckout::create($values);
    }

    /**
     * @param array $values
     * @return EarnVirtualCurrency
     */
    public static function earn_virtual_currency(array $values): EarnVirtualCurrency
    {
        return EarnVirtualCurrency::create($values);
    }

    /**
     * @param array $values
     * @return GenerateLead
     */
    public static function generate_lead(array $values): GenerateLead
    {
        return GenerateLead::create($values);
    }

    public static function item(array $values): Item
    {
        return Item::create($values);
    }

    /**
     * @param array $values
     * @return JoinGroup
     */
    public static function join_group(array $values): JoinGroup
    {
        return JoinGroup::create($values);
    }

    /**
     * @param array $values
     * @return LevelEnd
     */
    public static function level_end(array $values): LevelEnd
    {
        return LevelEnd::create($values);
    }

    /**
     * @param array $values
     * @return LevelStart
     */
    public static function level_start(array $values): LevelStart
    {
        return LevelStart::create($values);
    }

    /**
     * @param array $values
     * @return LevelUp
     */
    public static function level_up(array $values): LevelUp
    {
        return LevelUp::create($values);
    }

    /**
     * @param array $values
     * @return Login
     */
    public static function login(array $values): Login
    {
        return Login::create($values);
    }

    /**
     * @param array $values
     * @return PostScore
     */
    public static function post_score(array $values): PostScore
    {
        return PostScore::create($values);
    }

    /**
     * @param array $values
     * @return Purchase
     */
    public static function purchase(array $values): Purchase
    {
        return Purchase::create($values);
    }

    /**
     * @param array $values
     * @return Refund
     */
    public static function refund(array $values): Refund
    {
        return Refund::create($values);
    }

    /**
     * @param array $values
     * @return RemoveFromCart
     */
    public static function remove_from_cart(array $values): RemoveFromCart
    {
        return RemoveFromCart::create($values);
    }

    /**
     * @param array $values
     * @return Search
     */
    public static function search(array $values): Search
    {
        return Search::create($values);
    }

    /**
     * @param array $values
     * @return SelectContent
     */
    public static function select_content(array $values): SelectContent
    {
        return SelectContent::create($values);
    }

    /**
     * @param array $values
     * @return SelectItem
     */
    public static function select_item(array $values): SelectItem
    {
        return SelectItem::create($values);
    }

    /**
     * @param array $values
     * @return SelectPromotion
     */
    public static function select_promotion(array $values): SelectPromotion
    {
        return SelectPromotion::create($values);
    }

    /**
     * @param array $values
     * @return Share
     */
    public static function share(array $values): Share
    {
        return Share::create($values);
    }

    /**
     * @param array $values
     * @return SignUp
     */
    public static function sign_up(array $values): SignUp
    {
        return SignUp::create($values);
    }

    /**
     * @param array $values
     * @return SpendVirtualCurrency
     */
    public static function spend_virtual_currency(array $values): SpendVirtualCurrency
    {
        return SpendVirtualCurrency::create($values);
    }

    /**
     * @param GA4Object $object
     * @return array
     */
    public static function toDataLayer(GA4Object $object): array
    {
        $data = get_object_vars($object);

        foreach(array_keys($data) as $property) {
            if(is_array($data[$property])) {
                $data[$property] = array_values(array_map([GA4Helper::class, 'toDataLayer'], $data[$property]));
            } elseif(is_null($data[$property])) {
                unset($data[$property]);
            }
        }

        return $data;
    }

    /**
     * @param array $values
     * @return TutorialBegin
     */
    public static function tutorial_begin(array $values): TutorialBegin
    {
        return TutorialBegin::create($values);
    }

    /**
     * @param array $values
     * @return TutorialComplete
     */
    public static function tutorial_complete(array $values): TutorialComplete
    {
        return TutorialComplete::create($values);
    }

    /**
     * @param array $values
     * @return UnlockAchievement
     */
    public static function unlock_achievement(array $values): UnlockAchievement
    {
        return UnlockAchievement::create($values);
    }

    /**
     * @param array $values
     * @return ViewCart
     */
    public static function view_cart(array $values): ViewCart
    {
        return ViewCart::create($values);
    }

    /**
     * @param array $values
     * @return ViewItem
     */
    public static function view_item(array $values): ViewItem
    {
        return ViewItem::create($values);
    }

    /**
     * @param array $values
     * @return ViewItemList
     */
    public static function view_item_list(array $values): ViewItemList
    {
        return ViewItemList::create($values);
    }

    /**
     * @param array $values
     * @return ViewPromotion
     */
    public static function view_promotion(array $values): ViewPromotion
    {
        return ViewPromotion::create($values);
    }
}
