<?php

declare(strict_types=1);

namespace Sylius\ShopApiPlugin\Validator\Cart;

use Sylius\Component\Core\Repository\PaymentMethodRepositoryInterface;
use Sylius\ShopApiPlugin\Validator\Constraints\PaymentMethodExists;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Webmozart\Assert\Assert;

final class PaymentMethodExistsValidator extends ConstraintValidator
{
    /** @var PaymentMethodRepositoryInterface */
    private $paymentMethodRepository;

    public function __construct(PaymentMethodRepositoryInterface $paymentMethodRepository)
    {
        $this->paymentMethodRepository = $paymentMethodRepository;
    }

    /** {@inheritdoc} */
    public function validate($value, Constraint $constraint): void
    {
        Assert::isInstanceOf($constraint, PaymentMethodExists::class);

        if ($this->paymentMethodRepository->findOneBy(['code' => $value]) === null) {
            /** @var PaymentMethodExists $constraint */
            $this->context->addViolation($constraint->message);
        }
    }
}
