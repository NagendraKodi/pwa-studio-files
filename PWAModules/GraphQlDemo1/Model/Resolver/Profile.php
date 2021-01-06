<?php


namespace PWAModules\GraphQlDemo1\Model\Resolver;


use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Query\Resolver\ContextInterface;
use Magento\Framework\GraphQl\Query\Resolver\Value;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;
use Magento\Framework\GraphQl\Query\Resolver\ValueFactory;

class Profile implements ResolverInterface
{
    /**
     * @var ValueFactory
     */
    private $valueFactory;

    /*
     * @param ValueFactory $valueFactory
     */
    public function __construct(
        ValueFactory $valueFactory
    )
    {
        $this->valueFactory = $valueFactory;
    }

    /**
     * Fetches the data from persistence models and format it according to the GraphQL schema.
     *
     * @param Field $field
     * @param ContextInterface $context
     * @param ResolveInfo $info
     * @param array|null $value
     * @param array|null $args
     * @return Value|mixed
     * @throws \Exception
     */
    public function resolve(Field $field, $context, ResolveInfo $info, array $value = null, array $args = null)
    {
        try {
            $profile = $this->getProfile();
            $result = function () use ($profile) {
                return !empty($profile) ? $profile : [];
            };
            return $this->valueFactory->create($result);
        } catch (\Exception $exception) {
            throw new \Exception(__($exception->getMessage()));
        }
    }

    private function getProfile() {
        $profile = [
            'id' => 01,
            'author' => 'Nagendra Kodi',
            'module_name' => 'PWAModules_GraphQlDemo1',
        ];
        return $profile;
    }
}
