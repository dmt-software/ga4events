<?php

namespace DMT\GA4Events;

use Jawira\CaseConverter\CaseConverterException;
use Jawira\CaseConverter\Convert;

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
     * @throws CaseConverterException
     */
    public static function addPaymentInfo(array $values): AddPaymentInfo
    {
        return AddPaymentInfo::create($values);
    }

    /**
     * @param array $values
     * @return AddShippingInfo
     * @throws CaseConverterException
     */
    public static function addShippingInfo(array $values): AddShippingInfo
    {
        return AddShippingInfo::create($values);
    }

    /**
     * @param array $values
     * @return AddToCart
     * @throws CaseConverterException
     */
    public static function addToCart(array $values): AddToCart
    {
        return AddToCart::create($values);
    }

    /**
     * @param array $values
     * @return AddToWishlist
     * @throws CaseConverterException
     */
    public static function addToWishlist(array $values): AddToWishlist
    {
        return AddToWishlist::create($values);
    }

    /**
     * @param array $values
     * @return BeginCheckout
     * @throws CaseConverterException
     */
    public static function beginCheckout(array $values): BeginCheckout
    {
        return BeginCheckout::create($values);
    }

    /**
     * @param array $values
     * @return EarnVirtualCurrency
     * @throws CaseConverterException
     */
    public static function earnVirtualCurrency(array $values): EarnVirtualCurrency
    {
        return EarnVirtualCurrency::create($values);
    }

    /**
     * @param array $values
     * @return GenerateLead
     * @throws CaseConverterException
     */
    public static function generateLead(array $values): GenerateLead
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
     * @throws CaseConverterException
     */
    public static function joinGroup(array $values): JoinGroup
    {
        return JoinGroup::create($values);
    }

    /**
     * @param array $values
     * @return LevelEnd
     * @throws CaseConverterException
     */
    public static function levelEnd(array $values): LevelEnd
    {
        return LevelEnd::create($values);
    }

    /**
     * @param array $values
     * @return LevelStart
     * @throws CaseConverterException
     */
    public static function levelStart(array $values): LevelStart
    {
        return LevelStart::create($values);
    }

    /**
     * @param array $values
     * @return LevelUp
     * @throws CaseConverterException
     */
    public static function levelUp(array $values): LevelUp
    {
        return LevelUp::create($values);
    }

    /**
     * @param array $values
     * @return Login
     * @throws CaseConverterException
     */
    public static function login(array $values): Login
    {
        return Login::create($values);
    }

    /**
     * @param array $values
     * @return PostScore
     * @throws CaseConverterException
     */
    public static function postScore(array $values): PostScore
    {
        return PostScore::create($values);
    }

    /**
     * @param array $values
     * @return Purchase
     * @throws CaseConverterException
     */
    public static function purchase(array $values): Purchase
    {
        return Purchase::create($values);
    }

    /**
     * @param array $values
     * @return Refund
     * @throws CaseConverterException
     */
    public static function refund(array $values): Refund
    {
        return Refund::create($values);
    }

    /**
     * @param array $values
     * @return RemoveFromCart
     * @throws CaseConverterException
     */
    public static function removeFromCart(array $values): RemoveFromCart
    {
        return RemoveFromCart::create($values);
    }

    /**
     * @param string $script
     * @return string
     */
    protected static function scriptWrap(string $script): string
    {
        return '<script type="text/javascript">' . $script . '</script>';
    }

    /**
     * @param array $values
     * @return Search
     * @throws CaseConverterException
     */
    public static function search(array $values): Search
    {
        return Search::create($values);
    }

    /**
     * @param array $values
     * @return SelectContent
     * @throws CaseConverterException
     */
    public static function selectContent(array $values): SelectContent
    {
        return SelectContent::create($values);
    }

    /**
     * @param array $values
     * @return SelectItem
     * @throws CaseConverterException
     */
    public static function selectItem(array $values): SelectItem
    {
        return SelectItem::create($values);
    }

    /**
     * @param array $values
     * @return SelectPromotion
     * @throws CaseConverterException
     */
    public static function selectPromotion(array $values): SelectPromotion
    {
        return SelectPromotion::create($values);
    }

    /**
     * @param array $values
     * @return Share
     * @throws CaseConverterException
     */
    public static function share(array $values): Share
    {
        return Share::create($values);
    }

    /**
     * @param array $values
     * @return SignUp
     * @throws CaseConverterException
     */
    public static function signUp(array $values): SignUp
    {
        return SignUp::create($values);
    }

    /**
     * @param array $values
     * @return SpendVirtualCurrency
     * @throws CaseConverterException
     */
    public static function spendVirtualCurrency(array $values): SpendVirtualCurrency
    {
        return SpendVirtualCurrency::create($values);
    }

    /**
     * @param GA4Object $object
     * @return array
     * @throws CaseConverterException
     */
    public static function serialize(GA4Object $object): array
    {
        $data = [];

        foreach(get_object_vars($object) as $property => $value) {
            $convert = new Convert($property);
            $snakeProperty = $convert->toSnake();

            if(is_array($value)) {
                $data[$snakeProperty] = array_values(array_map([get_called_class(), 'serialize'], $value));
            } elseif(!is_null($value)) {
                $data[$snakeProperty] = $value;
            }
        }

        return $data;
    }

    /**
     * @param GA4Event $object
     * @return array
     * @throws CaseConverterException
     */
    public static function toDataLayer(GA4Event $object): array
    {
        return [
            'event' => get_class($object)::EVENT,
            'ecommerce' => $object->serialize(),
        ];
    }

    /**
     * @param GA4Event $object
     * @param bool $includeScriptTag
     * @param string $dataLayer
     * @return string
     * @throws CaseConverterException
     */
    public static function toDataLayerScript(GA4Event $object, bool $includeScriptTag = false, string $dataLayer = 'dataLayer'): string
    {
        $script = sprintf(
            '%s.push(%s);',
            $dataLayer, json_encode(static::toDataLayer($object))
        );

        if ($includeScriptTag) {
            $script = static::scriptWrap($script);
        }

        return $script;
    }

    public static function toGtag(GA4Event $object): array
    {
        return [
            'event',
            get_class($object)::EVENT,
            $object->serialize()
        ];
    }

    /**
     * @param GA4Event $object
     * @param bool $includeScriptTag
     * @param string $gtag
     * @return string
     */
    public static function toGtagScript(GA4Event $object, bool $includeScriptTag = false, string $gtag = 'gtag'): string
    {
        $script = sprintf(
            '%s(%s);',
            $gtag, substr(json_encode(static::toGtag($object)), 1, -1)
        );

        if ($includeScriptTag) {
            $script = static::scriptWrap($script);
        }

        return $script;
    }

    /**
     * @param array $values
     * @return TutorialBegin
     * @throws CaseConverterException
     */
    public static function tutorialBegin(array $values): TutorialBegin
    {
        return TutorialBegin::create($values);
    }

    /**
     * @param array $values
     * @return TutorialComplete
     * @throws CaseConverterException
     */
    public static function tutorialComplete(array $values): TutorialComplete
    {
        return TutorialComplete::create($values);
    }

    /**
     * @param array $values
     * @return UnlockAchievement
     * @throws CaseConverterException
     */
    public static function unlockAchievement(array $values): UnlockAchievement
    {
        return UnlockAchievement::create($values);
    }

    /**
     * @param array $values
     * @return ViewCart
     * @throws CaseConverterException
     */
    public static function viewCart(array $values): ViewCart
    {
        return ViewCart::create($values);
    }

    /**
     * @param array $values
     * @return ViewItem
     * @throws CaseConverterException
     */
    public static function viewItem(array $values): ViewItem
    {
        return ViewItem::create($values);
    }

    /**
     * @param array $values
     * @return ViewItemList
     * @throws CaseConverterException
     */
    public static function viewItemList(array $values): ViewItemList
    {
        return ViewItemList::create($values);
    }

    /**
     * @param array $values
     * @return ViewPromotion
     * @throws CaseConverterException
     */
    public static function viewPromotion(array $values): ViewPromotion
    {
        return ViewPromotion::create($values);
    }

    /**
     * @param string $name
     * @param array $arguments
     * @return mixed
     * @throws CaseConverterException
     */
    public static function __callStatic(string $name, array $arguments)
    {
        $convert = new Convert($name);

        $camelName = $convert->toCamel();

        return call_user_func_array([get_called_class(), $camelName], $arguments);
    }
}
