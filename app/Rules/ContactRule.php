<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ContactRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $rules = [
            'name' => 'required|min:5|max:80',
            'email' => 'required|email|max:255',
            'message' => 'required|min:10|max:1000'
        ];

        $validator = \Validator::make([$attribute => $value], [$attribute => $rules[$attribute] ?? '']);

        if ($validator->fails()) {
            $fail($validator->errors()->first());
            return;
        }

        $spamWords = [
            'viagra', 'prize', 'free', 'click here', 'buy now', 'winner', 'congratulations',
            'guarantee', 'money back', 'no risk', 'weight loss', 'cheap', 'bargain',
            'earn money', 'cash', 'credit', 'investment', 'miracle', 'offer', 'limited time',
            'order now', 'promotion', 'risk-free', 'trial', 'act now', 'be your own boss',
            'apply now', 'as seen on', 'call now', 'extra cash', 'fast cash', 'get paid',
            'great offer', 'increase sales', 'increase traffic', 'make money', 'meet singles',
            'money-making', 'online biz opportunity', 'potential earnings', 'promise you',
            'pure profit', 'special promotion', 'unsecured credit', 'work from home',
            'earn extra cash', 'lowest price', 'satisfaction guaranteed', 'unlimited',
            'limited offer', 'act immediately', 'amazing stuff', 'big bucks', 'cash bonus',
            'fast and easy', 'financial freedom', 'get out of debt', 'get started now',
            'incredible deal', 'instant', 'lose weight', 'luxury', 'no obligation',
            'no purchase necessary', 'not spam', 'one time', 'order today', 'potential income',
            'pure', 'risk free', 'shopper', 'take action', 'the best price', 'unlimited income',
            'warranty', 'win', 'winner', 'winning', 'your income', 'your order','followers',
            'likes','spam','spamming','sponsored','sponsoring','sponsoring','sponsoring','bot',

            // list 2
            'viagra', 'premio', 'gratis', 'haz clic aquí', 'ganador', 'felicitaciones',
            'garantía', 'sin riesgo', 'pérdida de peso', 'barato', 'ganga',
            'ganar dinero', 'dinero en efectivo', 'crédito', 'inversión', 'milagro', 'oferta',
            'tiempo limitado', 'sin riesgos', 'prueba', 'actúa','sé tu propio jefe', 'aplica', 'llama', 'dinero extra',
            'dinero rápido', 'recibe pagos', 'aumentar ventas', 'aumentar tráfico',
            'hacer dinero', 'conocer solteros', 'haciendo dinero', 'oportunidad de negocio en línea',
            'posibles ganancias', 'te prometo', 'pura ganancia', 'promoción especial', 'crédito sin garantía',
            'trabaja desde casa', 'ganar dinero extra', 'satisfacción garantizada',
            'ilimitado', 'actúa inmediatamente', 'cosas increíbles', 'gran cantidad de dinero',
            'bono en efectivo', 'rápido y fácil', 'libertad financiera', 'salir de deudas', 'comenzar',
            'instantáneo', 'bajar de peso', 'lujo', 'sin obligación', 'sin compra necesaria',
            'posibles ingresos', 'puro', 'sin riesgos', 'tomar acción', 'ingresos ilimitados', 'ganar', 'ganando',
            'tus ingresos', 'tu orden','seguidor','spam','patron','patrocinio','bot',

            'gratis', 'regalo', 'dinero', 'ganar', 'sin costo', 'garantizado', 'millonario', 'riqueza', 'préstamo', 'urgente', 'reembolso', 'cómpralo ya',
            'bajar ahora', 'no te lo pierdas', 'clic aquí', 'sueldo', 'asombroso', 'bonificación',
            'sexo',
        ];

        if ($attribute === 'name' || $attribute === 'message') {
            foreach ($spamWords as $word) {
                if (stripos($value, $word) !== false) {
                    $fail('El ' . $attribute . ' contiene palabras no permitidas');
                    return;
                }
            }

            $pattern = '/^[a-zA-Z0-9\s\.,?!áéíóúüñÁÉÍÓÚÜÑ;:()%\$]*$/';
            if (!preg_match($pattern, $value)) {
                $fail('El ' . $attribute . ' contiene caracteres invalidos');
                return;
            }

            $extensionPattern = '/\.\w{2,8}$/';
            if (preg_match($extensionPattern, $value)) {
                $fail('El ' . $attribute . ' no debe contener extensiones como .com, .net, etc.');
                return;
            }

            if (preg_match('/https?:\/\/[^\s]+/', $value)) {
                $fail('El ' . $attribute . ' contiene un enlace que podría indicar spam.');
                return;
            }

            if ($this->hasExcessiveEmptyLines($value) || $this->hasRepetitiveContent($value)) {
                $fail('El ' . $attribute . ' contiene contenido que podría indicar spam.');
                return;
            }

            if ($this->isRandomText($value)) {
                $fail('El ' . $attribute . ' contiene texto que parece ser letras al azar.');
                return;
            }
        }
    }

    /**
     * Check if the message has excessive empty lines.
     *
     * @param string $value
     * @return bool
     */
    private function hasExcessiveEmptyLines($value)
    {
        return substr_count($value, "\n") > 10;
    }

    /**
     * Check if the message has repetitive content.
     *
     * @param string $value
     * @return bool
     */
    private function hasRepetitiveContent($value)
    {
        $words = str_word_count($value, 1);
        $wordCounts = array_count_values($words);
        foreach ($wordCounts as $count) {
            if ($count > 6) {
                return true;
            }
        }
        return false;
    }

    /**
     * Check if the content looks like random text (e.g., gibberish).
     *
     * @param string $value
     * @return bool
     */
    private function isRandomText($value)
    {
        $words = explode(' ', $value);
        foreach ($words as $word) {
            if (!preg_match('/[aeiouáéíóúüAEIOUÁÉÍÓÚÜ]/', $word) || preg_match('/(.)\1{4,}/', $word)) {
                return true;
            }
        }
        return false;
    }
}
