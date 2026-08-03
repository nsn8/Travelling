<?php

namespace App\DTO\Documents;

use App\Enums\DocumentFilters;
use App\Helpers\DateHelper;
use Carbon\Carbon;

/**
 * @method string|null getDate()
 * @method string|null getOperator()
 */

class DocumentTimelineDTO extends DocumentsListDTO
{
    protected ?string $date;
    protected ?string $operator;

    public function __construct(array $data)
    {
        $data['active_filters'] = DocumentFilters::values();

        parent::__construct($data);

        if ($data['date_filter'] !== 'all_dates') {
            $this->date = Carbon::createFromFormat('d.m.Y', $data['date_filter'])->format('Y-m-d');
            $this->operator = '==';
            return;
        }

        switch ($data['timeline_filter']) {
            case 'past':
                $this->date = DateHelper::getTodayDate();
                $this->operator = '<';
                break;
            case 'future':
                $this->date = DateHelper::getTodayDate();
                $this->operator = '>';
                break;
            case 'yesterday':
                $this->date = DateHelper::getYesterdayDate();
                $this->operator = '==';
                break;
            case 'today':
                $this->date = DateHelper::getTodayDate();
                $this->operator = '==';
                break;
            case 'tomorrow':
                $this->date = DateHelper::getTomorrowDate();
                $this->operator = '==';
                break;
            default:
                $this->date = null;
                $this->operator = null;
        }
    }
}
