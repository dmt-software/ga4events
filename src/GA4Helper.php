<?php

namespace DmtSoftware\GA4Events;

/**
 * Google Analytics 4 helper
 *
 * @see https://developers.google.com/analytics/devguides/collection/ga4/reference/events
 */
class GA4Helper
{
    public static function add_payment_info(array $values): AddPaymentInfo
    {
        return AddPaymentInfo::create($values);
    }

    public static function add_shipping_info(array $values): AddShippingInfo
    {
        return AddShippingInfo::create($values);
    }

    public static function add_to_cart(array $values): AddToCart
    {
        return AddToCart::create($values);
    }

    public static function add_to_wishlist(array $values): AddToWishlist
    {
        return AddToWishlist::create($values);
    }

    public static function begin_checkout(array $values): BeginCheckout
    {
        return BeginCheckout::create($values);
    }

    public static function earn_virtual_currency(array $values): EarnVirtualCurrency
    {
        return EarnVirtualCurrency::create($values);
    }

    public static function generate_lead(array $values): GenerateLead
    {
        return GenerateLead::create($values);
    }

    public static function item(array $values): Item
    {
        return Item::create($values);
    }

    public static function join_group(array $values): JoinGroup
    {
        return JoinGroup::create($values);
    }

    public static function level_end(array $values): LevelEnd
    {
        return LevelEnd::create($values);
    }

    public static function level_start(array $values): LevelStart
    {
        return LevelStart::create($values);
    }

    public static function level_up(array $values): LevelUp
    {
        return LevelUp::create($values);
    }

    public static function login(array $values): Login
    {
        return Login::create($values);
    }

    public static function post_score(array $values): PostScore
    {
        return PostScore::create($values);
    }

    public static function purchase(array $values): Purchase
    {
        return Purchase::create($values);
    }

    public static function refund(array $values): Refund
    {
        return Refund::create($values);
    }

    public static function remove_from_cart(array $values): RemoveFromCart
    {
        return RemoveFromCart::create($values);
    }

    public static function search(array $values): Search
    {
        return Search::create($values);
    }

    public static function select_content(array $values): SelectContent
    {
        return SelectContent::create($values);
    }

    public static function select_item(array $values): SelectItem
    {
        return SelectItem::create($values);
    }

    public static function select_promotion(array $values): SelectPromotion
    {
        return SelectPromotion::create($values);
    }

    public static function share(array $values): Share
    {
        return Share::create($values);
    }

    public static function sign_up(array $values): SignUp
    {
        return SignUp::create($values);
    }

    public static function spend_virtual_currency(array $values): SpendVirtualCurrency
    {
        return SpendVirtualCurrency::create($values);
    }

    public static function toDataLayer(GA4Object $object): array
    {
        $data = get_object_vars($object);

        foreach(array_keys($data) as $property) {
            if ($data[$property] instanceof GA4Object) {
                $data[$property] = $data[$property]->toDataLayer();
            } elseif(is_array($data[$property])) {
                $data[$property] = array_values(array_map([GA4Helper::class, 'toDataLayer'], $data[$property]));
            } elseif(is_null($data[$property])) {
                unset($data[$property]);
            }
        }

        return $data;
    }

    public static function tutorial_begin(array $values): TutorialBegin
    {
        return TutorialBegin::create($values);
    }

    public static function tutorial_complete(array $values): TutorialComplete
    {
        return TutorialComplete::create($values);
    }

    public static function unlock_achievement(array $values): UnlockAchievement
    {
        return UnlockAchievement::create($values);
    }

    public static function view_cart(array $values): ViewCart
    {
        return ViewCart::create($values);
    }

    public static function view_item(array $values): ViewItem
    {
        return ViewItem::create($values);
    }

    public static function view_item_list(array $values): ViewItemList
    {
        return ViewItemList::create($values);
    }

    public static function view_promotion(array $values): ViewPromotion
    {
        return ViewPromotion::create($values);
    }
}
