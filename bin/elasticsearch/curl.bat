curl -XPUT localhost:9200/twitter/tweet/1 -d '
{
 "text": "Bienvenu à la conférence #elasticsearch pour #devoxxfr",
 "created_at": "2012-04-06T20:45:36.000Z",
 "source": "Twitter for android",
 "truncated": false,
 "retweet_count": 0,
 "hashtag": [
 {
 "text": "elasticsearch",
 "start": 27,
 "end": 40
 },
 {
 "text": "devoxxfr",
 "start": 47,
 "end": 55
 }],
 "user": {
 "id": 51172224,
 "name": "David Pilato",
 "screen_name": "dadoonet",
 "location": "France",
 "description": "Soft Architect, Project Manager, Senior Developper"
 }
}'