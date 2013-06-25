<?php

namespace SclZfCartPayment\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use SclZfCart\Entity\OrderInterface;
use SclZfCartPayment\Exception\InvalidArgumentException;

/**
 * Doctrine payment entity
 *
 * @ORM\Entity
 * @ORM\Table(name="cart_payment")
 *
 * @author Tom Oram <tom@scl.co.uk>
 */
class DoctrinePayment implements PaymentInterface
{
    /**
     * @var int
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    protected $status;

    /**
     * @var DoctrineOrderInterface
     * @ORM\ManyToOne(targetEntity="SclZfCart\Entity\DoctrineOrder")
     */
    protected $order;

    /**
     * @var DateTime
     * @ORM\Column(type="date")
     */
    protected $date;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    protected $type;

    /**
     * @var float
     * @ORM\Column(type="decimal", precision=11, scale=2)
     */
    protected $amount;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->date = new DateTime();
    }

    /**
     * {@inheritDoc}
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritDoc}
     *
     * @param  int $id
     * @return self
     */
    public function setId($id)
    {
        $this->id = (int) $id;

        return $this;
    }

    /**
     * {@inheritDoc}
     *
     * @return OrderInterface
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * {@inheritDoc}
     *
     * @param  OrderInterface $order
     * @return self
     */
    public function setOrder(OrderInterface $order)
    {
        $this->order = $order;

        return $this;
    }

    /**
     * {@inheritDoc}
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * {@inheritDoc}
     *
     * @param  string $status
     * @return self
     */
    public function setStatus($status)
    {
        if (!in_array(
            $status,
            array(self::STATUS_PENDING, self::STATUS_FAILED, self::STATUS_SUCCESS)
        )) {
            throw new InvalidArgumentException(
                sprintf('"%s", "%s" or "%s"', self::STATUS_PENDING, self::STATUS_FAILED, self::STATUS_SUCCESS),
                $status,
                __METHOD__,
                __LINE__
            );
        }

        $this->status = (string) $status;

        return $this;
    }

    /**
     * Get the date the payment was made.
     *
     * @return DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set the date the payment was made.
     *
     * @param  DateTime $date
     * @return self
     */
    public function setDate(DateTime $date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get the type of transaction.
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set the type of transaction.
     *
     * @param  string $type
     * @return self
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get the amount the payment was for.
     *
     * @return float
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set the amount the payment was for.
     *
     * @param  float $amount
     * @return self
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }
}
