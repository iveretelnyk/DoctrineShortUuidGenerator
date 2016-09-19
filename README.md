# DoctrineShortUuidGenerator
Short UUID generator for doctrine

Sometimes long doctrine ids is not good, so I've created id generator class which will allow you to create short unique ids

Put this class in AppBundle\ORM\Id and it will create 8 chars ids for your entity.

Example id definition

	/**
	 * @ORM\Id
	 * @ORM\Column(type="string", length=8)
	 * @ORM\GeneratedValue(strategy="CUSTOM")
	 * @ORM\CustomIdGenerator(class="\AppBundle\ORM\Id\ShortUuidGenerator")
	 */
	public $id;