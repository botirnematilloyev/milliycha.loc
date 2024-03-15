<?php

namespace common\models;

class OrderStatus
{
    const PRE = -11;
    const IN_BASKET = 0;
    const NEW = 1;
    const ACCEPTED = 2;
    const REJECTED = -1;
    const READY_TO_DELIVER = 3;
    const ON_ROAD = 4;
    const DELIVERED = 5;
}
