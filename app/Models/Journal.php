<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Journal extends Model
{
    use HasFactory;

    protected $table = 'journal.union_journals';

    protected $fillable = [
        'author_id',
        'reference',
        'live_host',
        'alternative_email',
        'operator_id',
        'payment_id',
        'item_json',
        'total',
        'stripe_payment_intent',
        'stripe_paid_date',
        'stripe_session_id',
        'stripe_session_issue_date',
        'stripe_invoice_id',
        'stripe_invoice_url',
        'stripe_invoice_status',
        'stripe_invoice_issue_date',
        'stripe_invoice_due_date',
        'date_time',
        'status',
    ];
}
