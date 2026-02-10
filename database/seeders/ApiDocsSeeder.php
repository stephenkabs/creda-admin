<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ApiDoc;

class ApiDocsSeeder extends Seeder
{
    public function run(): void
    {
        $orgId = 1; // 🔴 adjust if needed or loop per organization

        $docs = [

            /*
            |--------------------------------------------------------------------------
            | AUTHENTICATION
            |--------------------------------------------------------------------------
            */
            [
                'module' => 'Authentication',
                'title' => 'API Authentication',
                'method' => 'HEADER',
                'endpoint' => 'Authorization: Bearer {API_TOKEN}',
                'description' => 'All API requests must be authenticated using Bearer tokens. Each token is organization-scoped.',
                'notes' => 'Tokens are generated in Organization Settings → API Access. Tokens are shown once only.',
            ],

            /*
            |--------------------------------------------------------------------------
            | ORGANIZATION
            |--------------------------------------------------------------------------
            */
            [
                'module' => 'Organization',
                'title' => 'Identify Organization',
                'method' => 'GET',
                'endpoint' => '/api/v1/organization',
                'description' => 'Identify the company and map it to the accounting system (QuickBooks).',
                'response_example' => json_encode([
                    'success' => true,
                    'data' => [
                        'id' => 1,
                        'name' => 'Creda Loans Ltd',
                        'currency' => 'ZMW',
                        'country' => 'Zambia',
                    ]
                ], JSON_PRETTY_PRINT),
            ],

            /*
            |--------------------------------------------------------------------------
            | BRANCHES
            |--------------------------------------------------------------------------
            */
            [
                'module' => 'Branches',
                'title' => 'Fetch Branches (Cost Centers)',
                'method' => 'GET',
                'endpoint' => '/api/v1/branches',
                'description' => 'Retrieve branches to map them as cost centers or locations in QuickBooks.',
                'response_example' => json_encode([
                    [
                        'id' => 1,
                        'name' => 'Kabwe – Lusaka',
                        'code' => 'KBW01',
                        'is_active' => true,
                    ]
                ], JSON_PRETTY_PRINT),
            ],

            /*
            |--------------------------------------------------------------------------
            | CLIENTS
            |--------------------------------------------------------------------------
            */
            [
                'module' => 'Clients',
                'title' => 'Sync Clients (Customers)',
                'method' => 'GET',
                'endpoint' => '/api/v1/clients',
                'description' => 'Retrieve clients to create or update customers in QuickBooks.',
                'response_example' => json_encode([
                    'id' => 12,
                    'name' => 'Stephen Kabwe',
                    'nrc' => '411591/17/8',
                    'phone' => '+2609xxxxxxx',
                    'email' => 'client@email.com',
                ], JSON_PRETTY_PRINT),
                'notes' => 'Sync clients before syncing loans.',
            ],

            /*
            |--------------------------------------------------------------------------
            | LOANS
            |--------------------------------------------------------------------------
            */
            [
                'module' => 'Loans',
                'title' => 'Fetch Loans (Receivables)',
                'method' => 'GET',
                'endpoint' => '/api/v1/loans',
                'description' => 'Retrieve loans and sync them as invoices / receivables in QuickBooks.',
                'request_example' => json_encode([
                    'date_from' => '2026-01-01',
                    'date_to' => '2026-02-01',
                    'status' => 'completed',
                    'branch_id' => 1,
                ], JSON_PRETTY_PRINT),
                'response_example' => json_encode([
                    'id' => 16,
                    'reference' => 'loan-1770424922-4763',
                    'amount' => 7000,
                    'interest' => 364.58,
                    'total' => 7364.58,
                    'status' => 'completed',
                    'client' => [
                        'name' => 'Stephen Kabwe',
                        'nrc' => '411591/17/8',
                    ]
                ], JSON_PRETTY_PRINT),
                'notes' => 'Use reference as invoice number in QuickBooks.',
            ],

            /*
            |--------------------------------------------------------------------------
            | PAYMENTS
            |--------------------------------------------------------------------------
            */
            [
                'module' => 'Payments',
                'title' => 'Fetch Payments (Cash Receipts)',
                'method' => 'GET',
                'endpoint' => '/api/v1/payments',
                'description' => 'Retrieve payments and apply them to invoices in QuickBooks.',
                'response_example' => json_encode([
                    'id' => 45,
                    'amount' => 2964.10,
                    'paid_at' => '2026-02-07',
                    'loan' => [
                        'id' => 16,
                        'reference' => 'loan-1770424922-4763',
                        'total' => 7364.58,
                    ],
                    'client' => [
                        'name' => 'Stephen Kabwe',
                        'nrc' => '411591/17/8',
                    ]
                ], JSON_PRETTY_PRINT),
            ],

            /*
            |--------------------------------------------------------------------------
            | PAYMENT SUMMARY
            |--------------------------------------------------------------------------
            */
            [
                'module' => 'Payments',
                'title' => 'Payment Summary (Reconciliation)',
                'method' => 'GET',
                'endpoint' => '/api/v1/payments/summary',
                'description' => 'Retrieve loan balances for reconciliation and audit purposes.',
                'response_example' => json_encode([
                    'loan_id' => 16,
                    'loan_amount' => 7364.58,
                    'total_paid' => 5928.20,
                    'balance' => 1436.38,
                    'status' => 'active',
                ], JSON_PRETTY_PRINT),
            ],

            /*
            |--------------------------------------------------------------------------
            | BEST PRACTICES
            |--------------------------------------------------------------------------
            */
            [
                'module' => 'Best Practices',
                'title' => 'Integration Best Practices',
                'method' => 'INFO',
                'endpoint' => '-',
                'description' => 'Recommended integration flow and operational guidelines.',
                'notes' => implode("\n", [
                    'Sync clients before loans',
                    'Sync loans before payments',
                    'Store external accounting IDs',
                    'Run nightly reconciliation jobs',
                    'Tokens are organization-scoped',
                ]),
            ],
        ];

        foreach ($docs as $doc) {
            ApiDoc::create(array_merge($doc, [
                'organization_id' => $orgId,
                'is_active' => true,
            ]));
        }
    }
}
