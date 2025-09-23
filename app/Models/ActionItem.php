<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ActionItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'monitoring_note_id',
        'action_description',
        'item_type',
        'progress_note',
        'people_in_charge',
        'notes',
        'due_date',
        'completion_date',
        'status',
        'previous_action_item_id',
    ];

    protected $casts = [
        'due_date' => 'date',
        'completion_date' => 'date',
    ];

    public function monitoringNote(): BelongsTo
    {
        return $this->belongsTo(MonitoringNote::class);
    }

    public function previousActionItem(): BelongsTo
    {
        return $this->belongsTo(ActionItem::class, 'previous_action_item_id');
    }

    public function nextActionItems()
    {
        return $this->hasMany(ActionItem::class, 'previous_action_item_id');
    }
}
