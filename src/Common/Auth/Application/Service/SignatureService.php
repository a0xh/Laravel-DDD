<?php declare(strict_types=1);

namespace Core\Common\Auth\Application\Service;

final class SignatureService
{
    public function hasValid(
        string $userId, string $email, string $hash): bool
    {
        return hash_equals(
            known_string: hash_hmac(
                algo: 'sha256',
                data: sprintf('%s', $email . '|' . $userId),
                key: config(key: 'app.key')
            ),
            user_string: $hash
        );
    }
}
