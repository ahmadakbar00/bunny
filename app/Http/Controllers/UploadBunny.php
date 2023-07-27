<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Master;
use GuzzleHttp\Client;

class UploadBunny extends Controller {


    /**
     * Function Collection Bunny Implement
     * 
     */
        public function createCollectionBunny($title){

        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', 'https://video.bunnycdn.com/library/141387/collections', [
        'body' => '{"name":"'.$title.'"}',
        'headers' => [
            'AccessKey' => '10b7f788-061b-4dfc-9db3488975ee-7eca-4cce',
            'accept' => 'application/json',
            'content-type' => 'application/*+json',
        ],
        ]);

        return $response->getBody();
    }

    public function readCollectionListBunny(){

        $client = new \GuzzleHttp\Client();

        $response = $client->request('GET', 'https://video.bunnycdn.com/library/141387/collections', [
        'headers' => [
            'AccessKey' => '10b7f788-061b-4dfc-9db3488975ee-7eca-4cce',
            'accept' => 'application/json',
        ],
        ]);

        return $response->getBody();
    }

    public function updateCollectionBunny($params, $collectionId){

        $client = new \GuzzleHttp\Client();

        $response = $client->request('POST', 'https://video.bunnycdn.com/library/141387/collections/'.$collectionId, [
        'body' => '{"name":"'.$params->title.'"}',
        'headers' => [
            'AccessKey' => '10b7f788-061b-4dfc-9db3488975ee-7eca-4cce',
            'accept' => 'application/json',
            'content-type' => 'application/*+json',
        ],
        ]);

        return $response->getBody();
    }


    public function destroyCollectionBunny($collectionId){

        $client = new \GuzzleHttp\Client();

        $response = $client->request('DELETE', 'https://video.bunnycdn.com/library/141387/collections/'.$collectionId, [
            'headers' => [
                'AccessKey' => '10b7f788-061b-4dfc-9db3488975ee-7eca-4cce',
                'accept' => 'application/json',
            ],
            ]);

        return $response->getBody();
    }


    /**
     * Function Vidio Bunny Implement
     * 
     */

     public function createVidioBunny($request){

            $client = new \GuzzleHttp\Client();


            // $response = $client->request('POST', 'https://video.bunnycdn.com/library/141387/videos', [
            // 'body' => '{"title":"testing","collectionId":"84b7ace1-a1ed-4dea-96a2-765820db11cc"}',
  
            $response = $client->request('POST', 'https://video.bunnycdn.com/library/141387/videos', [
                // 'body' => '{"title":"'.$request->title.'","collectionId":"'.$request->collectionId.'"}',
                'body' => '{"title":"'.$request->title.'"}',
                'headers' => [
                'AccessKey' => '10b7f788-061b-4dfc-9db3488975ee-7eca-4cce',
                'accept' => 'application/json',
                'content-type' => 'application/*+json',
                ],
            ]);

            return $response->getBody();
     }

     public function uploadVidioBunny($id, $request ){

        $client = new \GuzzleHttp\Client();
        $apiKey = '10b7f788-061b-4dfc-9db3488975ee-7eca-4cce';

        // Get the video file content
        $videoData = file_get_contents($request->file('video')->getRealPath());

        // Prepare the API request data
        $data = [
            'AccessKey' => $apiKey,
            'file_name' => $request->input('title') . '.mp4', // Add the appropriate extension
            'content' => $videoData,
        ];

        // Make the API request to upload the video
        $response = $client->request('PUT', 'https://video.bunnycdn.com/library/141387/videos/'.$id, [
            'body' => $videoData,
            'headers' => [
                'AccessKey' => '10b7f788-061b-4dfc-9db3488975ee-7eca-4cce',
                'content-type' => 'application/binary',
                'Transfer-Encoding'=>'chunked'
            ],
        ]);

        return $response->getBody();

          // Handle the API response (you may add more error handling)
        // if ($response->getStatusCode() === 201) {
        //     return redirect()->back()->with('success', 'Video uploaded successfully!');
        // } else {
        //     return redirect()->back()->with('error', 'Failed to upload the video.');
        // }

    }

    public function listVidioBunny(){
        $client = new \GuzzleHttp\Client();

        $response = $client->request('GET', 'https://video.bunnycdn.com/library/141387/videos', [
        'headers' => [
            'AccessKey' => '10b7f788-061b-4dfc-9db3488975ee-7eca-4cce',
            'accept' => 'application/json',
        ],
        ]);

        echo $response->getBody();
    }

    public function updateInformationVidioBunny($id, $request){
        $client = new \GuzzleHttp\Client();

        $response = $client->request('POST', 'https://video.bunnycdn.com/library/141387/videos/'.$id, [
        'body' => '{"title":"'.$request->title.'"}',
        'headers' => [
            'AccessKey' => '10b7f788-061b-4dfc-9db3488975ee-7eca-4cce',
            'accept' => 'application/json',
            'content-type' => 'application/*+json',
        ],
        ]);

        return $response->getBody();
    }

    public function deleteVidioBunny($id){
        $client = new \GuzzleHttp\Client();

        $response = $client->request('DELETE', 'https://video.bunnycdn.com/library/141387/videos/'.$id, [
        'headers' => [
            'AccessKey' => '10b7f788-061b-4dfc-9db3488975ee-7eca-4cce',
            'accept' => 'application/json',
        ],
        ]);

        echo $response->getBody();
    }

    public function getVidioBunny($id){
        $client = new \GuzzleHttp\Client();

        $response = $client->request('GET', 'https://video.bunnycdn.com/library/141387/videos/'.$id, [
        'headers' => [
            'AccessKey' => '10b7f788-061b-4dfc-9db3488975ee-7eca-4cce',
            'accept' => 'application/json',
        ],
        ]);

        echo $response->getBody();
        return TRUE;
    }

    public function createThumbnailBunny($id, $imgUrl){
        $client = new \GuzzleHttp\Client();

        $response = $client->request('POST', 'https://video.bunnycdn.com/library/141387/videos/'.$id.'/thumbnail?thumbnailUrl='.$imgUrl, [
        'headers' => [
            'AccessKey' => '10b7f788-061b-4dfc-9db3488975ee-7eca-4cce',
            'accept' => 'application/json',
        ],
        ]);

        echo $response->getBody();
    }

    public function createCaption($id, $request){

        // dd($request->caption);
        $client = new \GuzzleHttp\Client();

        $response = $client->request('POST', 'https://video.bunnycdn.com/library/141387/videos/'.$id.'/captions/'.$request->caption, [
        'body' => '{"srclang":"bbb","label":"ccc","captionsFile":"ddd"}',
            'headers' => [
            'AccessKey' => '10b7f788-061b-4dfc-9db3488975ee-7eca-4cce',
            'accept' => 'application/json',
            'content-type' => 'application/*+json',
        ],
        ]);

        echo $response->getBody();
    }

    public function uploadToBunnyNet(Request $request)
    {
        $apiKey = 'YOUR_BUNNY_NET_API_KEY';
        $zoneName = 'YOUR_BUNNY_NET_ZONE_NAME';
        $file = $request->file('file'); // Ambil file dari request

        // Menggunakan Guzzle HTTP Client untuk mengirimkan permintaan POST ke bunny.net
        $client = new Client([
            'headers' => [
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . $apiKey,
            ],
            'multipart' => [
                [
                    'name' => 'file',
                    'contents' => fopen($file->path(), 'r'),
                    'filename' => $file->getClientOriginalName(),
                ],
            ],
        ]);

        $response = $client->post("https://storage.bunnycdn.com/{$zoneName}/", [
            'headers' => [
                'Content-Type' => 'multipart/form-data',
            ],
            'connect_timeout' => 10,
            'timeout' => 0,
        ]);

        // Jika Anda ingin menangani respons atau melakukan tindakan lain setelah unggah berhasil, Anda dapat mengakses $response->getBody() atau kode status $response->getStatusCode()
        // Contoh:
        // $responseBody = $response->getBody()->getContents();
        // $statusCode = $response->getStatusCode();

        return redirect()->back()->with('success', 'File berhasil diunggah ke bunny.net!');
    }

    
}

?>