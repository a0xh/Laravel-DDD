## Basic project in Laravel/DDD



TAMAN — Слёзы
ChipaChip — Всю ночь
Bakr — Грустно дождю
Idleexmoon — By Индия - вечеринка (speed up/nightcore)
MACAN feat. SCIRENA — Я хочу с тобой
Рем Дигга — Тринадцатый
Akmal' — Раневская
uniqe, nkeeei, ARTEM SHILOVETS, Wipo — ГЛАМУР
WHITE GALLOWS, КРИСПИ — Сейфом
GRACE — несравнимое










Для реализации паттерна Data Mapper в контексте Domain-Driven Design (DDD) с использованием Eloquent в Laravel необходимо создать четкую границу между доменным слоем и слоем доступа к данным. Это поможет избежать зависимости доменных моделей от Eloquent и обеспечит чистоту доменной логики. Вот основные шаги, как это можно сделать.
Шаги для реализации Data Mapper в DDD
1. Создание доменных моделей
Начните с создания чистых доменных моделей, которые не будут зависеть от Eloquent. Эти модели должны содержать только бизнес-логику и свойства, необходимые для вашей предметной области.

php
class User {
    private string $id;
    private string $name;
    private string $email;

    public function __construct(string $id, string $name, string $email) {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
    }

    // Геттеры и другие методы бизнес-логики
}

2. Определение интерфейса репозитория
Создайте интерфейс репозитория, который будет использоваться для взаимодействия с данными:

php
interface UserRepositoryInterface {
    public function find(string $id): ?User;
    public function save(User $user): void;
    public function delete(string $id): void;
}

3. Реализация репозитория с использованием Eloquent
Создайте класс, который реализует интерфейс репозитория и использует Eloquent для доступа к данным. Этот класс будет служить слоем между доменной моделью и Eloquent.

php
class UserRepositoryEloquent implements UserRepositoryInterface {
    public function find(string $id): ?User {
        $eloquentUser = UserEloquent::find($id);
        return $eloquentUser ? new User($eloquentUser->id, $eloquentUser->name, $eloquentUser->email) : null;
    }

    public function save(User $user): void {
        $eloquentUser = new UserEloquent();
        $eloquentUser->id = $user->getId();
        $eloquentUser->name = $user->getName();
        $eloquentUser->email = $user->getEmail();
        $eloquentUser->save();
    }

    public function delete(string $id): void {
        UserEloquent::destroy($id);
    }
}

4. Создание Eloquent модели
Создайте Eloquent модель, которая будет представлять таблицу в базе данных. Она должна быть простой и не содержать бизнес-логики.

php
use Illuminate\Database\Eloquent\Model;

class UserEloquent extends Model {
    protected $table = 'users';
    
    // Убедитесь, что модель не содержит методов или логики,
    // которые могут повлиять на доменные модели.
}

5. Использование в контроллере
Теперь вы можете использовать репозиторий в контроллере, не беспокоясь о том, что ваша доменная логика зависит от Eloquent.

php
class UserController extends Controller {
    protected UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository) {
        $this->userRepository = $userRepository;
    }

    public function show($id) {
        $user = $this->userRepository->find($id);
        if (!$user) {
            abort(404);
        }
        return response()->json($user);
    }

    public function store(Request $request) {
        $user = new User(null, $request->name, $request->email);
        $this->userRepository->save($user);
        return response()->json($user);
    }
}

Заключение
