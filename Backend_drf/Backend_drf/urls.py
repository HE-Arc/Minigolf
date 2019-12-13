from django.urls import include, path
from rest_framework import routers

from users import views as user_views
from minigolfs import views as minigolf_views
from courses import views as course_views
from games import views as game_views

router = routers.DefaultRouter()
router.register(r'users', user_views.UserViewSet)
router.register(r'groups', user_views.GroupViewSet)
router.register(r'minigolfs', minigolf_views.MinigolfViewSet)
router.register(r'courses', course_views.CourseViewSet)
router.register(r'games', game_views.GameViewSet)

urlpatterns = [
    path('', include(router.urls)),
    path('api-auth/', include('rest_framework.urls', namespace='rest_framework'))
]
