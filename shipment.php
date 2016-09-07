<?
$saleOrder = Bitrix\Sale\Order::load($ORDER_ID);
$shipmentCollection = $saleOrder->getShipmentCollection();
$shipmentIds = [];
foreach ($shipmentCollection as $shipment)
{
    if($shipment->isSystem())
        continue;

    $shipmentIds[] = $shipment->getField("ID");
}
$SHIPMENT =  [
    1=>[ //да именнно 1 ,  а не 0,  потому что 0 - это системная ерунда
        "SHIPMENT_ID" => $shipmentIds[0], //ID отгрузки
        "DELIVERY_ID" => 3, //ID доставки
        "PROFILE" => 4, //ID профиля
        ]
];
$result = \Bitrix\Sale\Helpers\Admin\Blocks\OrderShipment::updateData($saleOrder, $SHIPMENT);
$saveResult = $saleOrder->save();
?>
