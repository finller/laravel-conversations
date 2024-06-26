<?php

namespace Finller\Conversation;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class ConversationServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-conversations')
            ->hasConfigFile()
            ->hasMigrations([
                'create_conversations_table',
                'create_messages_table',
                'create_conversation_user_table',
                'add_uuid_to_conversations_table',
            ])
            ->hasMigrations([
                'add_muted_at_column_to_conversation_user_table',
                'add_messaged_at_column_to_conversations_table',
            ])
            ->hasMigrations([
                'add_origin_to_messages_table',
            ]);
    }
}
