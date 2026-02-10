<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\OrderItem> $orderItems
 * @property-read int|null $order_items_count
 * @property-read \App\Models\User|null $user
 * @method static Builder<static>|Order drafts()
 * @method static Builder<static>|Order newModelQuery()
 * @method static Builder<static>|Order newQuery()
 * @method static Builder<static>|Order query()
 * @property int $id
 * @property string $tracking_number
 * @property float $total
 * @property int $is_draft
 * @property string $status
 * @property string $payment_method
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static Builder<static>|Order whereCreatedAt($value)
 * @method static Builder<static>|Order whereId($value)
 * @method static Builder<static>|Order whereIsDraft($value)
 * @method static Builder<static>|Order wherePaymentMethod($value)
 * @method static Builder<static>|Order whereStatus($value)
 * @method static Builder<static>|Order whereTotal($value)
 * @method static Builder<static>|Order whereTrackingNumber($value)
 * @method static Builder<static>|Order whereUpdatedAt($value)
 * @method static Builder<static>|Order whereUserId($value)
 * @mixin \Eloquent
 */
class Order extends Model
{
    use HasFactory;
    public const STATUS_PENDING = 'pending';
    public const STATUS_SHIPPED = 'shipped';
    public const STATUS_DELIVERED = 'delivered';
    public const STATUS_CANCELED = 'canceled';

    public const PAYMENT_METHOD_CASH = 'cash';
    public const PAYMENT_METHOD_PAYPAL = 'paypal';

    protected $fillable = [
        'tracking_number',
        'total',
        'is_draft',
        'status',
        'payment_method',
        'user_id'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'order_items', 'order_id', 'product_id')
            ->using(OrderItem::class)
            ->withPivot(['quantity', 'unit_price'])
            ->withTimestamps()
            ;
    }

    #[Scope]
    protected function drafts(Builder $query): void
    {
        $query->where('is_draft', true);
    }
}
